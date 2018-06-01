<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('quantity');
    }

    public static function stock($id)
    {
        return (static::where('id', $id)->first()->stock);
    }

    public static function hasStock($id)
    {
        return (bool) (static::stock($id) > 0);
    }

    public static function inStock($id)
    {
        return (bool) (static::stock($id) > 5);
    }

    public static function lowStock($id)
    {
        return (bool) (static::stock($id) > 0 && static::stock($id) < 5);
    }

    public static function exists($id)
    {
        return auth()->user()->products()->where('product_id', $id)->exists();
    }

    public static function incrementQuantity($id)
    {
        auth()->user()->products()->whereProductId($id)->increment('quantity');
    }

    public static function productQuantity($id)
    {
        return auth()->user()->products()->whereId($id)->first()->pivot->quantity;
    }

    public static function addToCart($id)
    {
        if (!static::exists($id)) {
            auth()->user()->products()->attach($id);
        } else {
            if (static::stock($id) > static::productQuantity($id)) {
                static::incrementQuantity($id);
            }
        }

        return redirect()->home();
    }
}