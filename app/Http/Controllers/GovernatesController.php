<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GovernatesController extends Controller
{
    public function getGovernates()
    {
        $governatesJson = file_get_contents(resource_path('data/governates.json'));

        $governates = json_decode($governatesJson, true);

        return response()->json($governates);
    }
}
