<?php

namespace App\Http\Responses;

use App\Product;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class CartUpdateQuantityResponse implements Responsable
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        if ((Product::stock($this->id) >= request()->quantity)) {
            auth()->user()->products()->updateExistingPivot($this->id, ['quantity' => request()->quantity]);

            cache()->forget('cart' . auth()->id());

            return redirect()->back();
        }

        return redirect()->home();
    }
}