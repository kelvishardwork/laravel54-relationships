<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        $keySearch = 'a';
        # $country = Country::where('name', 'Brazil')->get()->first();

        // Usando o With ele já me traz o estados em uma única consulta
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")
            ->with('states')
            ->get();

        foreach ($countries as $country) {
            echo "<b>{$country->name}</b>";
            $states = $country->states()->get();
            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}";
            }
            echo '<hr>';
        }
        #  Como metodo usamos pra fazer filtro de Busca com condicao
        # $states = $country->states()->where('initials','GO')->get();
    }

    public function manyToOne()
    {
        $stateName = 'Pequim';
        $state = State::where('name', $stateName)->get()->first();
        echo "<b>{$state->name}</b>";
        $country = $state->country;
        echo "<br/> País : {$country->name}";
    }

    public function oneToManyTwo()
    {
        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")
            ->with('states.cities')
            ->get();
        // dd($countries);
        foreach ($countries as $country) {
            echo "<b>{$country->name}</b>";
            foreach ($country->states as $state) {
                echo "<br>{$state->initials} - {$state->name}";
                foreach ($state->cities as $city) {
                    echo "<br><li><i>{$city->name }</i></li>";
                }
            }
            echo '<hr>';
        }
    }

    public function oneToManyInsert()
    {
        $dataForm = [
            'name' => 'Mato Grosso',
            'initials' => 'MT',
        ];
        $country = Country::find(1);
        $insertState = $country->states()->create($dataForm);
        dd($insertState);
    }

    public function oneToManyInsertTwo()
    {
        $dataForm = [
            'name' => 'Paraná',
            'initials' => 'PA',
            'country' => '1'
        ];
        $insertState = State::create($dataForm);
        dd($insertState);
    }
}
