<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\ProductsCategories;
use App\Models\ProductsCategoriesRelate;
use App\Models\ProductsCategoriesSub;
use App\Models\ProductsImages;
use App\Models\ProductsPrices;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.products.create')
            ->with('scripts', $a = ['product-publish', 'select', 'upload-product-images'])
            ->with('categories', ProductsCategories::getCategories())
            ->with('regions', Region::getRegions());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Requests\ProductsPublishRequest $publishRequest, Product $product, ProductsCategoriesRelate $sub, ProductsImages $productsImages, ProductsPrices $prices)
    {
        /* Save product */
        $product->type_id = 1;
        $product->user_id = Auth::user()->id;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->city_id = $request->input('city_id');
        $product->ended = Carbon::now()->addDay(14);
        $product->status_publish = 1;
        $product->status_control = 1;
        $product->state = 1;
        $product->save();

        /* Save category */
        $sub->product_id = $product->id;
        $sub->category_sub_id = $request->input('category_sub_id');
        $sub->save();

        /* Save prive */
        $prices->product_id = $product->id;
        $prices->price = $request->input('price');
        $prices->save();

        /* Save images */
        $images = $request->input('images');
        if($images)
        {
            $image = new \Images();
            for($i = 0; $i < count($images); $i++)
            {
                $image->moveImage($images[$i]);
                $create = $productsImages->create([
                    'product_id' => $product->id,
                    'name' => $images[$i]
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
