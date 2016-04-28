<?php

namespace App\Http\Controllers\Xhr;

use App\Models\ProductsCategoriesSub;
use Helpers;
use App\Models\RegionsCity;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        if(!$this->request->ajax()) throw new HttpException(500);
    }

    public function getCities()
    {
        $id = $this->request->input('id');
        return Helpers::select(RegionsCity::getCitiesByRegion($id), '', 'Выберите город');
    }

    public function getCategories()
    {
        $id = $this->request->input('id');
        return Helpers::select(ProductsCategoriesSub::getCategoriesSubByCat($id), '', 'Выберите рубрику');
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
        $src = $this->request->input('imageName');

        $delete = new \Images();
        $delete->deleteProductImage($src);
    }

    public function messagesError()
    {
        return response()->view('_helpers.messages.error-fields');
    }

    public function messagesSuccess()
    {
        return response()->view('_helpers.modals.success');
    }
}
