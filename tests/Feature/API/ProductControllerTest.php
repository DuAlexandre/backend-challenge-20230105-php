<?php

namespace Tests\Feature\API;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_products_endpoint(): void
    {
        $products = Product::factory(3)->create();
        $response = $this->getJson('/api/products');
        
        $response->assertStatus(200);
        $response->assertJsonCount(3);

        $response->assertJson(function (AssertableJson $json) use($products){
            $json->whereAllType([
                '0.id'               => 'integer',
                '0.code'             => 'integer',
                '0.status'           => 'string',
                '0.imported_t'       => 'dateTime',
                '0.url'              => 'string',
                '0.creator'          => 'string',
                '0.created_t'        => 'integer',
                '0.last_modified_t'  => 'integer',
                '0.product_name'     => 'string',
                '0.quantity'         => 'string',
                '0.brands'           => 'string',
                '0.categories'       => 'string',
                '0.labels'           => 'string',
                '0.cities'           => 'string',
                '0.purchase_places'  => 'string',
                '0.stores'           => 'string',
                '0.ingredients_text' => 'string',
                '0.traces'           => 'string',
                '0.serving_size'     => 'string',
                '0.serving_quantity' => 'float',
                '0.nutriscore_score' => 'integer',
                '0.nutriscore_grade' => 'string',
                '0.main_category'    => 'string',
                '0.image_url'        => 'string'
            ]);

            $json->hasAll(
                [
                    '0.id',
                    '0.code',
                    '0.status',
                    '0.imported_t',
                    '0.url',
                    '0.creator',
                    '0.created_t',
                    '0.last_modified_t',
                    '0.product_name',
                    '0.quantity',
                    '0.brands',
                    '0.categories',
                    '0.labels',
                    '0.cities',
                    '0.purchase_places',
                    '0.stores',
                    '0.ingredients_text',
                    '0.traces',
                    '0.serving_size',
                    '0.serving_quantity',
                    '0.nutriscore_score',
                    '0.nutriscore_grade',
                    '0.main_category',
                    '0.image_url'
                ]);

            $product = $products->first();

            $json->whereAll([
                '0.id'               => $product->id,
                '0.code'             => $product->code,
                '0.status'           => $product->status,
                '0.imported_t'       => $product->imported_t,
                '0.url'              => $product->url,
                '0.creator'          => $product->creator,
                '0.created_t'        => $product->created_t,
                '0.last_modified_t'  => $product->last_modified_t,
                '0.product_name'     => $product->product_name,
                '0.quantity'         => $product->quantity,
                '0.brands'           => $product->brands,
                '0.categories'       => $product->categories,
                '0.labels'           => $product->labels,
                '0.cities'           => $product->cities,
                '0.purchase_places'  => $product->purchase_places,
                '0.stores'           => $product->stores,
                '0.ingredients_text' => $product->ingredients_text,
                '0.traces'           => $product->traces,
                '0.serving_size'     => $product->serving_size,
                '0.serving_quantity' => $product->serving_quantity,
                '0.nutriscore_score' => $product->nutriscore_score,
                '0.nutriscore_grade' => $product->nutriscore_grade,
                '0.main_category'    => $product->main_category,
                '0.image_url'        => $product->image_url
            ]);
        });  
    }


    public function test_get_single_product_endpoint(): void
    {
        $product = Product::factory(1)->createOne();
        $response = $this->getJson('/api/products/' . $product->id );
        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use($product){
            
            $json->hasAll(
                [
                    'id',
                    'code',
                    'status',
                    'imported_t',
                    'url',
                    'creator',
                    'created_t',
                    'last_modified_t',
                    'product_name',
                    'quantity',
                    'brands',
                    'categories',
                    'labels',
                    'cities',
                    'purchase_places',
                    'stores',
                    'ingredients_text',
                    'traces',
                    'serving_size',
                    'serving_quantity',
                    'nutriscore_score',
                    'nutriscore_grade',
                    'main_category',
                    'image_url',
                    'created_at',
                    'updated_at'
                ]);

                $json->whereAllType([
                    'id'               => 'integer',
                    'code'             => 'integer',
                    'status'           => 'string',
                    'imported_t'       => 'dateTime',
                    'url'              => 'string',
                    'creator'          => 'string',
                    'created_t'        => 'integer',
                    'last_modified_t'  => 'integer',
                    'product_name'     => 'string',
                    'quantity'         => 'string',
                    'brands'           => 'string',
                    'categories'       => 'string',
                    'labels'           => 'string',
                    'cities'           => 'string',
                    'purchase_places'  => 'string',
                    'stores'           => 'string',
                    'ingredients_text' => 'string',
                    'traces'           => 'string',
                    'serving_size'     => 'string',
                    'serving_quantity' => 'float',
                    'nutriscore_score' => 'integer',
                    'nutriscore_grade' => 'string',
                    'main_category'    => 'string',
                    'image_url'        => 'string'
                ]);

                $json->whereAll([
                    'id'               => $product->id,
                    'code'             => $product->code,
                    'status'           => $product->status,
                    'imported_t'       => $product->imported_t,
                    'url'              => $product->url,
                    'creator'          => $product->creator,
                    'created_t'        => $product->created_t,
                    'last_modified_t'  => $product->last_modified_t,
                    'product_name'     => $product->product_name,
                    'quantity'         => $product->quantity,
                    'brands'           => $product->brands,
                    'categories'       => $product->categories,
                    'labels'           => $product->labels,
                    'cities'           => $product->cities,
                    'purchase_places'  => $product->purchase_places,
                    'stores'           => $product->stores,
                    'ingredients_text' => $product->ingredients_text,
                    'traces'           => $product->traces,
                    'serving_size'     => $product->serving_size,
                    'serving_quantity' => $product->serving_quantity,
                    'nutriscore_score' => $product->nutriscore_score,
                    'nutriscore_grade' => $product->nutriscore_grade,
                    'main_category'    => $product->main_category,
                    'image_url'        => $product->image_url
                ]);
        });
    }


    public function test_post_product_endpoint()
    {
        $product = Product::factory(1)->makeOne()->toArray();

        $response = $this->postJson('/api/products', $product);

        $response->assertStatus(201);
        
        $response->assertJson(function (AssertableJson $json) use($product){
            $json->hasAll(
                [
                    'id',
                    'code',
                    'status',
                    'imported_t',
                    'url',
                    'creator',
                    'created_t',
                    'last_modified_t',
                    'product_name',
                    'quantity',
                    'brands',
                    'categories',
                    'labels',
                    'cities',
                    'purchase_places',
                    'stores',
                    'ingredients_text',
                    'traces',
                    'serving_size',
                    'serving_quantity',
                    'nutriscore_score',
                    'nutriscore_grade',
                    'main_category',
                    'image_url',
                    'created_at',
                    'updated_at'
                ]);

                $json->whereAllType([
                    'id'               => 'integer',
                    'code'             => 'integer',
                    'status'           => 'string',
                    'imported_t'       => 'dateTime',
                    'url'              => 'string',
                    'creator'          => 'string',
                    'created_t'        => 'integer',
                    'last_modified_t'  => 'integer',
                    'product_name'     => 'string',
                    'quantity'         => 'string',
                    'brands'           => 'string',
                    'categories'       => 'string',
                    'labels'           => 'string',
                    'cities'           => 'string',
                    'purchase_places'  => 'string',
                    'stores'           => 'string',
                    'ingredients_text' => 'string',
                    'traces'           => 'string',
                    'serving_size'     => 'string',
                    'serving_quantity' => 'float',
                    'nutriscore_score' => 'integer',
                    'nutriscore_grade' => 'string',
                    'main_category'    => 'string',
                    'image_url'        => 'string'
                ]);

                $json->whereAll([
                    'id'               => $product['id'],
                    'code'             => $product['code'],
                    'status'           => $product['status'],
                    'imported_t'       => $product['imported_t'],
                    'url'              => $product['url'],
                    'creator'          => $product['creator'],
                    'created_t'        => $product['created_t'],
                    'last_modified_t'  => $product['last_modified_t'],
                    'product_name'     => $product['product_name'],
                    'quantity'         => $product['quantity'],
                    'brands'           => $product['brands'],
                    'categories'       => $product['categories'],
                    'labels'           => $product['labels'],
                    'cities'           => $product['cities'],
                    'purchase_places'  => $product['purchase_places'],
                    'stores'           => $product['stores'],
                    'ingredients_text' => $product['ingredients_text'],
                    'traces'           => $product['traces'],
                    'serving_size'     => $product['serving_size'],
                    'serving_quantity' => $product['serving_quantity'],
                    'nutriscore_score' => $product['nutriscore_score'],
                    'nutriscore_grade' => $product['nutriscore_grade'],
                    'main_category'    => $product['main_category'],
                    'image_url'        => $product['image_url']
                ])->etc();

        });
    }


    public function test_put_product_endpoint()
    {
        Product::factory(1)->createOne();
        $product = [
            'code'             => 20221126,
            'status'           => "published",
            'imported_t'       => "2020-02-07T16:00:00Z",
            'url'              => "https://world.openfoodfacts.org/product/20221126",
            'creator'          => "securita",
            'created_t'        => 1415302075,
            'last_modified_t'  => 1572265837,
            'product_name'     => "Madalenas quadradas",
            'quantity'         => "380 g (6 x 2 u.)",
            'brands'           => "La Cestera",
            'categories'       => "Lanches comida, Lanches doces, Biscoitos e Bolos, Bolos, Madalenas",
            'labels'           => "Contem gluten, Contém derivados de ovos, Contém ovos",
            'cities'           => "",
            'purchase_places'  => "Braga,Portugal",
            'stores'           => "Lidl",
            'ingredients_text' => "farinha de trigo, açúcar, óleo vegetal de girassol, clara de ovo, ovo, humidificante (sorbitol), levedantes químicos (difosfato dissódico, hidrogenocarbonato de sódio), xarope de glucose-frutose, sal, aroma",
            'traces'           => "Frutos de casca rija,Leite,Soja,Sementes de sésamo,Produtos à base de sementes de sésamo",
            'serving_size'     => "madalena 31.7 g",
            'serving_quantity' => 31.7,
            'nutriscore_score' => 17,
            'nutriscore_grade' => "d",
            'main_category'    => "en:madeleines",
            'image_url'        => "https://static.openfoodfacts.org/images/products/20221126/front_pt.5.400.jpg"
        ];

        $response = $this->putJson('/api/product/1', $product);
        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use($product){
            $json->hasAll(
                [
                    'id',
                    'code',
                    'status',
                    'imported_t',
                    'url',
                    'creator',
                    'created_t',
                    'last_modified_t',
                    'product_name',
                    'quantity',
                    'brands',
                    'categories',
                    'labels',
                    'cities',
                    'purchase_places',
                    'stores',
                    'ingredients_text',
                    'traces',
                    'serving_size',
                    'serving_quantity',
                    'nutriscore_score',
                    'nutriscore_grade',
                    'main_category',
                    'image_url',
                    'created_at',
                    'updated_at'
                ]);

                $json->whereAllType([
                    'id'               => 'integer',
                    'code'             => 'integer',
                    'status'           => 'string',
                    'imported_t'       => 'dateTime',
                    'url'              => 'string',
                    'creator'          => 'string',
                    'created_t'        => 'integer',
                    'last_modified_t'  => 'integer',
                    'product_name'     => 'string',
                    'quantity'         => 'string',
                    'brands'           => 'string',
                    'categories'       => 'string',
                    'labels'           => 'string',
                    'cities'           => 'string',
                    'purchase_places'  => 'string',
                    'stores'           => 'string',
                    'ingredients_text' => 'string',
                    'traces'           => 'string',
                    'serving_size'     => 'string',
                    'serving_quantity' => 'float',
                    'nutriscore_score' => 'integer',
                    'nutriscore_grade' => 'string',
                    'main_category'    => 'string',
                    'image_url'        => 'string'
                ]);

                $json->whereAll([
                    'id'               => $product['id'],
                    'code'             => $product['code'],
                    'status'           => $product['status'],
                    'imported_t'       => $product['imported_t'],
                    'url'              => $product['url'],
                    'creator'          => $product['creator'],
                    'created_t'        => $product['created_t'],
                    'last_modified_t'  => $product['last_modified_t'],
                    'product_name'     => $product['product_name'],
                    'quantity'         => $product['quantity'],
                    'brands'           => $product['brands'],
                    'categories'       => $product['categories'],
                    'labels'           => $product['labels'],
                    'cities'           => $product['cities'],
                    'purchase_places'  => $product['purchase_places'],
                    'stores'           => $product['stores'],
                    'ingredients_text' => $product['ingredients_text'],
                    'traces'           => $product['traces'],
                    'serving_size'     => $product['serving_size'],
                    'serving_quantity' => $product['serving_quantity'],
                    'nutriscore_score' => $product['nutriscore_score'],
                    'nutriscore_grade' => $product['nutriscore_grade'],
                    'main_category'    => $product['main_category'],
                    'image_url'        => $product['image_url']
                ])->etc();
        });
    }



    public function test_patch_product_endpoint()
    {
        Product::factory(1)->createOne();
        $product = [
            'code' => 20221127,
        ];

        $response = $this->patchJson('/api/products/1', $product);
        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use($product){
            $json->hasAll(
                [
                    'id',
                    'code',
                    'status',
                    'imported_t',
                    'url',
                    'creator',
                    'created_t',
                    'last_modified_t',
                    'product_name',
                    'quantity',
                    'brands',
                    'categories',
                    'labels',
                    'cities',
                    'purchase_places',
                    'stores',
                    'ingredients_text',
                    'traces',
                    'serving_size',
                    'serving_quantity',
                    'nutriscore_score',
                    'nutriscore_grade',
                    'main_category',
                    'image_url',
                    'created_at',
                    'updated_at'
                ]);

                $json->whereAllType([
                    'id'               => 'integer',
                    'code'             => 'integer',
                    'status'           => 'string',
                    'imported_t'       => 'dateTime',
                    'url'              => 'string',
                    'creator'          => 'string',
                    'created_t'        => 'integer',
                    'last_modified_t'  => 'integer',
                    'product_name'     => 'string',
                    'quantity'         => 'string',
                    'brands'           => 'string',
                    'categories'       => 'string',
                    'labels'           => 'string',
                    'cities'           => 'string',
                    'purchase_places'  => 'string',
                    'stores'           => 'string',
                    'ingredients_text' => 'string',
                    'traces'           => 'string',
                    'serving_size'     => 'string',
                    'serving_quantity' => 'float',
                    'nutriscore_score' => 'integer',
                    'nutriscore_grade' => 'string',
                    'main_category'    => 'string',
                    'image_url'        => 'string'
                ]);

            $json->where('code', $product['code']);
        });
    }


    public function test_delete_product_endpoint()
    {
        Product::factory(1)->createOne();
        $response = $this->deleteJson('/api/products/1');

        $response->assertStatus(204);
    }
}
