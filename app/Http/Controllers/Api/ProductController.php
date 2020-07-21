<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Product;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();

        return new ProductCollection($products);
    }

    public function show($id)
    {
        $products = $this->product->find($id);

        return new ProductResource($products);
    }

    public function save(Request $request) 
    {
        $data = $request->all();
        $product = $this->product->create($data);

        return response()->json($product, 200);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $product = $this->product->find($data['id']);
        $product->update($data);

        return response()->json($product, 200);
    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();

        return response()->json(['data' =>['msg' => 'Produto removido com sucesso.']]);
    }
}
