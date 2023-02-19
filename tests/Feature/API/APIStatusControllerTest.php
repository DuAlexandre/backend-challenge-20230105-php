<?php

namespace Tests\Feature\API;

use App\Models\APIStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * API Status tests
 */
class APIStatusControllerTest extends TestCase
{
    /**
     * Reinitializes the database after every test
     */
    use RefreshDatabase;
    

    /**
     * GET ALL STATUS TEST
     */
    public function test_get_all_api_status_endpoint(): void
    {
        $apiStatus = APIStatus::factory(3)->create();
        $response = $this->getJson('/api/');
        $response->assertStatus(200);
        $response->assertJsonCount(3);
        
        $response->assertJson(function (AssertableJson $json) use($apiStatus){
            $json->whereAllType([
                '0.id'             => 'integer',
                '0.dateImport'     => 'string',
                '0.status'         => 'string',
                '0.memoryConsumed' => 'string'
            ]);

            $json->hasAll(['0.id', '0.dateImport', '0.status', '0.memoryConsumed']);

            $api = $apiStatus->first();

            $json->whereAll([
                '0.id'             => $api->id,
                '0.dateImport'     => $api->dateImport,
                '0.status'         => $api->status,
                '0.memoryConsumed' => $api->memoryConsumed
            ]);
        });  
    }
}
