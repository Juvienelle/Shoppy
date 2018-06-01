<?php

namespace App\Http\Responses;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;

class CartAddResponse implements Responsable
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        Product::addToCart($this->id);

        cache()->forget('cart' . auth()->id());

        return redirect()->back();
    }
}