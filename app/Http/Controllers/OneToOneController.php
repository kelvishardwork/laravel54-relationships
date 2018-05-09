<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Localization;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
        //$country = Country::find(1);
        $country = Country::where('name', 'Brazil')
            ->get()
            ->first();
        echo $country->name;
        $location = $country->localization;
        echo "<hr>Latitude{$location->latitude}";
        echo "<hr>Longitude{$location->longitude}";

    }

    public function oneToOneInverse()
    {
        $latitude = 456;
        $longitude = 654;

        $localization = Localization::where('latitude', $latitude)
            ->where('longitude', $longitude)
            ->get()
            ->first();

        $country = $localization->country()->get()->first();
        //$country = $localization->country;
        echo $country;
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name' => 'Italia',
            'latitude' => 71,
            'longitude' => 93,
        ];

        # Criar um novo pais
        //$country = Country::create($dataForm);

        # Buscar um pais existe
        $country = Country::where('name', 'China')->get()->first();

        # Metódo 1
        /*$localization = new Localization;
        $localization->latitude = $dataForm['latitude'];
        $localization->longitude = $dataForm['longitude'];
        $localization->country_id = $country->id;
        $saveLocation = $localization->save();*/


        # Método 2
        $location = $country->localization()->create($dataForm);
        var_dump($location);

    }
}
