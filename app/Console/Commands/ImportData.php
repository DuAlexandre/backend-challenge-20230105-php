<?php

namespace App\Console\Commands;

use App\Models\APIStatus;
use App\Models\Product;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:openfoodfacts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import or update JSON data from OpenFoodFacts API to MySQL';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        for($i = 1; $i <= 9; $i++)
        {
            // Get all .gz files
            $gzip_file = 'https://challenges.coode.sh/food/data/json/products_0'.$i.'.json.gz';
            $destination = 'products_0'.$i.'.json';

            $gzip_data = file_get_contents($gzip_file);

            file_put_contents($destination . '.gz', $gzip_data);

            $gzip_handle = gzopen($destination . '.gz', 'rb');
            $json_data = [];

            //Only the first 100 lines of each file
            for ($i = 0; $i < 100; $i++) {
                $line = gzgets($gzip_handle);
                if ($line === false) {
                    break;
                }
                array_push($json_data, $line);
            }

            gzclose($gzip_handle);

            //Removes all unnecessary characters
            $formatterOne = str_replace(';;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;', '', $json_data);
            $formatterTwo = str_replace(';;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;', '', $formatterOne);
            $formatterThree = str_replace('"\\', '', $formatterTwo);
            $formatterFour = str_replace(':r"', ':""', $formatterThree);
            $productFinal = str_replace('} {', '},{', $formatterFour );
            
            $status = "";
            foreach ($productFinal as  $productUnit) {
                $productData = json_decode($productUnit, true);
                $product = Product::updateOrCreate(
                    ['code' => intval( $productData['code'] )],
                    [
                        'status'           => 'published',
                        'imported_t'       => now(),
                        'url'              => $productData['url'] ?? null,
                        'creator'          => $productData['creator'] ?? null,
                        'created_t'        => $productData['created_t'] ?? null,
                        'last_modified_t'  => $productData['last_modified_t'] ?? null,
                        'product_name'     => $productData['product_name'] ?? null,
                        'quantity'         => $productData['quantity'] ?? null,
                        'brands'           => $productData['brands'] ?? null,
                        'categories'       => $productData['categories'] ?? null,
                        'labels'           => $productData['labels'] ?? null,
                        'cities'           => $productData['cities'] ?? null,
                        'purchase_places'  => $productData['purchase_places'] ?? null,
                        'stores'           => $productData['stores'] ?? null,
                        'ingredients_text' => $productData['ingredients_text'] ?? null,
                        'traces'           => $productData['traces'] ?? null,
                        'serving_size'     => $productData['serving_size'] ?? null,
                        'serving_quantity' => intval($productData['serving_quantity']) ?? null,
                        'nutriscore_score' => intval($productData['nutriscore_score']) ?? null,
                        'nutriscore_grade' => $productData['nutriscore_grade'] ?? null,
                        'main_category'    => $productData['main_category'] ?? null,
                        'image_url'        => $productData['image_url'] ?? null,
                    ]
                );

                if ($product) $status = "SUCCESSFULLY IMPORTED DATA.";
                else $status = "DATA IMPORT FAILURE, PLEASE REFER TO laravel.log.";
            }
        }
        $memory = memory_get_usage();
        $memoryConsumed = round($memory / 1024) . 'KB';

        //Records the import statuses in the database
        APIStatus::create(
            [
                'dateImport'     => now(),
                'status'         => $status,
                'memoryConsumed' => $memoryConsumed,
            ]
        );
    }
}
