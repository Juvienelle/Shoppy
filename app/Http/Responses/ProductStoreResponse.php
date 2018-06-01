<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class ProductStoreResponse implements Responsable
{
    public function toResponse($request)
    {
        \ProductRepository::create([
            'title'             => strtolower(request()->title),
            'description'       => request()->description,
            'price'             => request()->price,
            'stock'             => request()->stock,
        ]);

        cache()->forget('products');

        return redirect()->home();
    }
}