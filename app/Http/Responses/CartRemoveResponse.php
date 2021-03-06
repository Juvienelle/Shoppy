<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class CartRemoveResponse implements Responsable
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        auth()->user()->products()->detach($this->id);

        cache()->forget('cart' . auth()->id());

        return redirect()->back();
    }
}