<?php

use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\Auth;

class Images
{
    /*
    |--------------------------------------------------------------------------
    | Image manipulation Helper
    |--------------------------------------------------------------------------
    |
     */
    protected $mimeSupported = ['image/png', 'image/jpeg'];
    protected $mimeSave = '.jpg';
    protected $maxImageSize = 5000000;
    protected $nameImage;
    protected $pathImage;
    protected $file;
    public $response;

    public function __construct($file = null)
    {
        $this->nameImage = str_random(32);
        if($file) $this->fileValidate($file);
    }

    /**
     * Checking file for exceptions
     * @param $file
     * @return bool
     */
    private function fileValidate($file)
    {
        if (!isset($file[0])) throw new FileException(500);

        elseif ($file[0]->getClientSize() > $this->maxImageSize) throw new FileException(500);

        else $this->file = $file[0];
    }

    /**
     * Render full image path
     * @return string
     */
    private function renderImage()
    {
        return $this->pathImage . $this->nameImage . $this->mimeSave;
    }

    /**
     * Prepare user photo
     * @return mixed
     */
    public function setUserPhoto()
    {
        $this->pathImage = public_path() . '/images/users/';
        $main_photo = Auth::user()->main_photo;

        if (in_array($this->file->getMimeType(), $this->mimeSupported)) {
            if ($main_photo) {
                if (file_exists($this->pathImage . $main_photo)) {
                    unlink($this->pathImage . $main_photo);
                    $this->saveUserPhoto();
                } else {
                    $this->saveUserPhoto();
                }
            } else {
                $this->saveUserPhoto();
            }
        }
        return response()->json(['imageName' => Auth::user()->main_photo]);
    }

    /**
     * Make user photo and save to DB
     */
    private function saveUserPhoto()
    {
        Image::make($this->file)->fit(100, 100)->save($this->renderImage(), 100);
        Auth::user()->main_photo = $this->nameImage . $this->mimeSave;
        Auth::user()->save();
    }

    /**
     * Make product images
     * @return \Illuminate\Http\JsonResponse
     */
    public function setProductImages()
    {
        $this->pathImage = public_path().'/images/tmp/products-images/';
        Image::make($this->file)->fit(140, 90)->save($this->renderImage(), 100);
        return response()
            ->json(['productImage' => $this->nameImage . $this->mimeSave]);
    }

    /**
     * Delete tmp product images
     * @param $src
     */
    public function deleteProductImage($src)
    {
        if(file_exists(public_path().$src))
        {
            unlink(public_path().$src);
        }
    }
}