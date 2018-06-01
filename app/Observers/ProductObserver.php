<?php

namespace App\Observers;

use App\Product;

class ProductObserver
{
    public function creating(Product $product)
    {
        if (request()->hasFile('photo')) {
            $file  = request()->photo;
            $fileName = sha1($file->getClientOriginalName() . time() . uniqid(true)) . '.' .$file->extension();
            $file->move(public_path('photos'),$fileName);
            $product->photo = $fileName;
        } else {
            $product->photo = request()->photo;
        }
    }
}