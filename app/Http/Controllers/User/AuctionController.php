<?php

namespace App\Http\Controllers\User;

use App\Models\AuctionsType;
use App\Models\ProductsCategories;
use App\Models\Region;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuctionController extends Controller
{
    /**
     * Create auction form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.auction.create')
            ->with('scripts', $scripts = ['product-publish', 'select', 'upload-product-images','auction'])
            ->with('categories', ProductsCategories::getCategories())
            ->with('regions', Region::getRegions())
            ->with('auctionTypes', AuctionsType::getAuctionsType());
    }

    /**
     * Save auction
     * @param Request $request
     */
    public function store(Request $request)
    {

    }
}
