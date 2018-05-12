<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::where('name', 'São Paulo')->get()->first();
        echo "<b>{$city->name}</b>";

        $companies = $city->companies;
        foreach ($companies as $company) {
            echo "<br> {$company->name}, ";
        }
    }

    public function manyToManyInverse()
    {
        $company = Company::where('name', 'Microsoft')->get()->first();
        echo "<b>{$company->name}</b>";
        $cities = $company->cities;
        foreach ($cities as $city) {
            echo "<br> {$city->name}, ";
        }
    }

    public function manyToManyInsert()
    {
        $dataForm = [2, 3];
        $company = Company::find(3);
        echo "<b>{$company->name}: </b><br>";
        /**
         * # Attach incrementa itens
         * $company->cities()->attach($dataForm);
         * # Sync sincronizar os que tem
         * $company->cities()->sync($dataForm);
         * # Detach remove um ou mais itens
         * $company->cities()->detach([2]);
         */
        $cities = $company->cities;
        foreach ($cities as $city) {
            echo "<br> {$city->name}, ";
        }
    }
}
