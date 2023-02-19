<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\APIStatusService;
use Illuminate\Http\Request;

class APIStatusController extends Controller
{
    private $api;
    
    public function __construct(APIStatusService $api)
    {
        $this->api = $api;
    }

    public function index()
    {
        return response()->json($this->api->index());
    }
}
