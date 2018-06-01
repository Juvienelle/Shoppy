<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Responses\{CartIndexResponse, CartAddResponse, CartUpdateQuantityResponse, CartRemoveResponse};

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return new CartIndexResponse;
    }

    public function add($id)
    {
        return new CartAddResponse($id);
    }

    public function updateQuantity($id)
    {
        return new CartUpdateQuantityResponse($id);
    }

    public function remove($id)
    {
        return new CartRemoveResponse($id);
    }
}