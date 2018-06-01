<?php

namespace App\Http\Responses;

use App\Product;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class ProductShowResponse implements Responsable
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function toResponse($request)
    {
        return view('products.show', ['product' => $this->product]);
    }
}