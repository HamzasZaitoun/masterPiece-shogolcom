<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CityController extends Controller
{
    public function getCities($governorate)
    {
        $json = File::get(resource_path('data/cities.json'));
        $cities = json_decode($json, true);

        // Filter cities based on the selected governate
        if (isset($cities[$governorate])) {
            $filteredCities = $cities[$governorate];
        } else {
            $filteredCities = [];
        }

        return response()->json($filteredCities);
    }
}
