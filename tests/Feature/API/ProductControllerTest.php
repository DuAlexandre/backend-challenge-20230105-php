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
                '0.id' => 'integer',
                '0.title' => 'string',
                '0.isbn' => 'string'
            ]);

            $json->hasAll(['0.id', '0.title', '0.isbn']);

            $product = $products->first();

            $json->whereAll([
                '0.id' => $product->id,
                '0.title' => $product->title,
                '0.isbn' => $product->isbn
            ]);
        });  
    }


    public function test_get_single_product_endpoint(): void
    {
        $product = Product::factory(1)->createOne();
        $response = $this->getJson('/api/products/' . $product->id );
        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use($product){
            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);

            $json->whereAllType([
                'id' => 'integer',
                'title' => 'string',
                'isbn' => 'string'
            ]);

            $json->whereAll([
                'id' => $product->id,
                'title' => $product->title,
                'isbn' => $product->isbn
            ]);
        });
    }


    public function test_post_product_endpoint()
    {
        $product = Product::factory(1)->makeOne()->toArray();

        $response = $this->postJson('/api/products', $product);

        $response->assertStatus(201);
        
        $response->assertJson(function (AssertableJson $json) use($product){
            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);

            $json->whereAllType([
                'id' => 'integer',
                'title' => 'string',
                'isbn' => 'string'
            ]);

            $json->whereAll([
                'title' => $product['title'],
                'isbn' => $product['isbn']
            ])->etc();

        });
    }


    public function test_put_product_endpoint()
    {
        Product::factory(1)->createOne();
        $product = [
            'title' => 'Atualizando Livro...',
            'isbn' => '1234567890'
        ];

        $response = $this->putJson('/api/product/1', $product);
        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use($product){
            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);

            $json->whereAllType([
                'id' => 'integer',
                'title' => 'string',
                'isbn' => 'string'
            ]);

            $json->whereAll([
                'title' => $product['title'],
                'isbn' => $product['isbn']
            ])->etc();
        });
    }



    public function test_patch_product_endpoint()
    {
        Product::factory(1)->createOne();
        $product = [
            'title' => 'Atualizando Livro...'
        ];

        $response = $this->patchJson('/api/products/1', $product);
        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use($product){
            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);

            $json->whereAllType([
                'id' => 'integer',
                'title' => 'string',
                'isbn' => 'string'
            ]);

            $json->where('title', $product['title']); // seria o mesmo que passar 'id' => $book['id'], 'created_at' => $book['created_at], etc

        });
    }


    public function test_delete_product_endpoint()
    {
        Product::factory(1)->createOne();
        $response = $this->deleteJson('/api/products/1');

        $response->assertStatus(204);
    }
}
