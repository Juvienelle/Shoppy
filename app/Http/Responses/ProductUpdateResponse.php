<?php

namespace App\Http\Responses;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class ProductUpdateResponse implements Responsable
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function toResponse($request)
    {
        $this->product->update([
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'stock' => request('stock')
        ]);

        cache()->forget('products');

        return back();
    }
}