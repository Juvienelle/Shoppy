<?php

namespace App\Repositories;

use App\Cart;

class CartRepository extends Repository
{
    protected $model;

    public function __construct(Cart $model)
    {
        $this->model = $model;
    }
}