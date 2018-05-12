<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class HasManyThrough extends Controller
{
    public function hasManyThrough()
    {
        $country = Country::find(1);
        echo "<b>{$country->name}:</b><br>";

        $cities = $country->cities;
        foreach ($cities as $city) {
            echo " {$city->name}, ";
        }
        echo " <br><b> Total de Cidades </b> {$cities->count()}";
    }
}
