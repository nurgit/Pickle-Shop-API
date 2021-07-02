<?php

namespace App\Http\Controllers;
use App\Http\Resources\product\ProductCollection;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Model\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductCollection::collection(Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product= new Product();
        $product->name=$request->name;
        $product->weight=$request->weight;
        $product->test=$request->test;
        $product->detail=$request->detail;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->save();
       return response([
           'data'=>new ProductResource($product)
       ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $getProduct= Product::find($id);
        return new ProductResource($getProduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
      //  return request();
        $getProduct= Product::find($id);
         $getProduct->update($request->all());
         return response([
            'data'=>new ProductResource ($getProduct)
        ],Response::HTTP_CREATED);
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
