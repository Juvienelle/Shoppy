<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserSignedUp;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequestForm as Form;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('auth.signup');
    }

    public function store(Form $form)
    {
        $user = \App\User::create([
            'email'    => request('email'),
            'username' => request('username'),
            'password' => bcrypt(request('password')),
        ]);

        event(new UserSignedUp($user));

        \Auth::login($user);

        return redirect()->home();
    }
}