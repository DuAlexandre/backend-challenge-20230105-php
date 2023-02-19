<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    
    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return response()->json($this->product->index());
    }

    public function show($id)
    {
        return response()->json($this->product->show($id));
    }

    public function store(Request $request)
    {
        $book = $this->product->store($request->all());
        return response()->json($book, 201);
    }

    public function update($id, Request $request)
    {
        $book = $this->product->update($id, $request->all());
        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = $this->product->destroy($id);
        return response()->json([],204);
    }
}
