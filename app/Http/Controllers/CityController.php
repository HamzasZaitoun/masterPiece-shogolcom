<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities()
    {
        $citiesJson = file_get_contents(resource_path('data/cities.json'));

        $cities = json_decode($citiesJson, true);

        return response()->json($cities);
    }
}
