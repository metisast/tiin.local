<?php

namespace App\Http\Controllers\Xhr;

use App\Models\ProductsCategoriesSub;
use Helpers;
use App\Models\RegionsCity;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class Xhr extends Controller
{
    protected $request;
    protected $mime = ['image/png', 'image/jpeg'];
    protected $maxImageSize = 5000000;

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

    public function photo(Guard $guard)
    {
        if(!isset($this->request->file()[0]))
        {
            return response()
                ->json(['error' => 'limit is exceeded'])
                ->setStatusCode(500);
        }

        $file = $this->request->file()[0];
        if($file->isValid() && $file->getClientSize() < $file->getMaxFilesize())
        {
            if($file->getClientSize() > $this->maxImageSize)
            {
                return response()
                ->json(['error' => 'limit is exceeded'])
                ->setStatusCode(500);
            }

            $name = str_random(32);
            $pathImage = public_path().'/images/users/';
            $mime = '.jpg';

            if(in_array($file->getMimeType(), $this->mime))
            {
                if($guard->user()->main_photo)
                {
                    if(file_exists($pathImage.$guard->user()->main_photo))
                    {
                        unlink($pathImage.$guard->user()->main_photo);

                        Image::make($file)->widen(100)->save($pathImage.$name.$mime, 100);
                        $guard->user()->main_photo = $name.$mime;
                        $guard->user()->save();
                    }
                    else
                    {
                        Image::make($file)->widen(100)->save($pathImage.$name.$mime, 100);
                        $guard->user()->main_photo = $name.$mime;
                        $guard->user()->save();
                    }
                }
                return response()->json(['imageName' => $guard->user()->main_photo]);
            }
            else
            {
                return response()
                    ->json(['error' => 'file must be jpeg or png'])
                    ->setStatusCode(500);
            }
        }
        else
        {
            return response()
                ->json([$this->request->file()[0]->getError()])
                ->setStatusCode(500);
        }
    }
}
