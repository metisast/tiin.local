<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Region;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Product $product)
    {
        $products = $product::getProductsById();
        return view('user.index')
            ->with('products', $products);
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
