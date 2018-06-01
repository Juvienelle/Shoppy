<?php

namespace App\Http\Controllers\Auth;

use App\Events\ProfileWasUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequestForm;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.profile.index', ['user' => auth()->user()]);
    }

    public function create()
    {
        return view('auth.profile.update', ['user' => auth()->user()]);
    }

    public function store(ProfileRequestForm $form)
    {
        $profile = auth()->user()->profile()->update([
            'name'       => request('name'),
            'bio'        => request('bio'),
            'about'      => request('about'),
        ]);

        event(new ProfileWasUpdated);

        return back();
    }
}