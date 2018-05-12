<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function cities()
    {
        /**
         * Preciso colocar o nome da tabela de pivo, pq o nome default vem em ordem alfabetica
         * Ficaria 'city_company'
         */
        return $this->belongsToMany(City::class, 'company_city');
    }
}
