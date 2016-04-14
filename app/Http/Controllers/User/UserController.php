<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function profile(User $user)
    {

        return view('user.profile.index');
    }
}
