<?php

namespace App\Http\Controllers\Xhr;

use App\Models\ProductsCategoriesSub;
use Helpers;
use App\Models\RegionsCity;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Xhr extends Controller
{
    protected $request;
    protected $mime = ['image/png', 'image/jpeg'];
    protected $maxImageSize = 5000000;
    protected $nameImage;
    protected $pathImage;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getCities()
    {
        $id = $this->request->input('id');
        return Helpers::select(RegionsCity::getCitiesByRegion($id), 0, 'Выберите город');
    }

    public function getCategories()
    {
        $id = $this->request->input('id');
        return Helpers::select(ProductsCategoriesSub::getCategoriesSubByCat($id), 0);
    }

    /**
     * Create user photo
     * @return \Illuminate\Http\JsonResponse
     */
    public function photo()
    {
        $photo = new \Images($this->request->file());
        return $photo->setUserPhoto();
    }

    /**
     * Create product images
     * @return \Illuminate\Http\JsonResponse
     */
    public function productImages()
    {
        $image = new \Images($this->request->file());
        return $image->setProductImages();
    }

    /**
     * Delete tmp product images
     * @return void
     */
    public function productImagesDelete()
    {
        $src = $this->request->input('src');

        $delete = new \Images();
        $delete->deleteProductImage($src);
    }
}
