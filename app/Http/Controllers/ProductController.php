<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search   = $request->string("search");

        $products = Product::query()->when(
            $search !== null, 
            fn(Builder $query) => $query->where("name", "like", "%$search%")
        )
        ->get();

        return view("product-list", [
            "products" => $products
        ]);
    }


    public function create()
    {
        return view("add-product-form");
    }


    public function edit(Product $product) 
    {
        return view("edit-product-form", [ "product" => $product]);    
    }

    
    public function show(Product $product) 
    {
        return view("show-product", [
            "product" => $product
        ]);    
    }


    public function store(StoreProductRequest $request)
    {
        $product = new Product($request->all());

        if (!$product->save()) {
            throw new HttpResponseException(
                new Response("The product {$product->name} failed to save")
            );
        }

        return response()->json([
            "success" => true
        ]);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        
        if (!$product->save()) {
            throw new HttpResponseException(
                new Response("The product {$product->name} failed to update")
            );
        }

        return response()->json([
            "success" => true
        ]);
    }


    public function destroy(Product $product)
    {
        $isProductDeleted = $product->delete();

        if(!$isProductDeleted) {
            return back()->withInput([
                "message" => "There's an error when delete the product"
            ]);
        }

        return response()->json([
            "success" => true
        ]);
    }
}
