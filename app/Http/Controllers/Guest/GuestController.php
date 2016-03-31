<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }
}
