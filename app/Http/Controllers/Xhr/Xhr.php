<?php

namespace App\Http\Controllers\Xhr;

use Helpers;
use App\Models\RegionsCity;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Xhr extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getCities()
    {
        $id = $this->request->input('id');
        return Helpers::select(RegionsCity::getCitiesByRegion($id), 0, 'Выберите город');
    }
}
