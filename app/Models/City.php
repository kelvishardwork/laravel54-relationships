<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function companies()
    {
        /**
         * Preciso colocar o nome da tabela de pivo, pq o nome default vem em ordem alfabetica
         * Ficaria 'city_company'
         */
        return $this->belongsToMany(Company::class, 'company_city');
    }
}
