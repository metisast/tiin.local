<?php

namespace App\Http\Controllers\User;

use App\Models\Region;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {
        return view('user.profile.index')
            ->with('scripts', $a = ['test.js'])
            ->with('regions', Region::getRegions());
    }

    public function editProfile(Request $request)
    {
        dd($request->all());
    }
}
