<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Rating::where('id_product', $product->id)->delete();
        $product->delete();

        return response()->noContent();
    }

    public function rateProduct(User $user, Product $product, $rate)
    {
        $rating = Rating::where('id_user', $user->id)
                        ->where('id_product', $product->id)
                        ->first();
        
        if ($rating) {
            $rating->rating = $rate;
            $rating->save();
        } else {
            $rating = Rating::create([
                'id_user'    => $user->id,
                'id_product' => $product->id,
                'rating'     => $rate,
            ]);
        }

        return response()->noContent();
    }

    public function outOfStock(Product $product)
    {
        $product->status = 0;
        $product->save();

        return response()->noContent();
    }


}
