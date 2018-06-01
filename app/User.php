<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function hasPrivillege($privillege)
    {
        return $this->roles()->where('slug', $privillege)->exists();
    }

    public function hasRole($role)
    {
        $permissions = json_decode($this->roles->first()->permissions, true);

        return (array_key_exists($role, $permissions) && $permissions[$role]) ? true : false;
    }

    protected function getName()
    {
        return $this->profile->name ?? null;
    }

    protected function getUsername()
    {
        return $this->username ?? null;
    }

    public function getUsernameOrName()
    {
        return $this->getName() ?: $this->getUsername();
    }
}