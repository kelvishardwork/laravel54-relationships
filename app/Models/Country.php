<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    public function localization()
    {
        //return $this->hasOne(Localization::class, 'country_id', 'id');
        return $this->hasOne(Localization::class);
    }

    public function states()
    {
        # Se seguirmos o padrão com as convenções do Laravel nnão precisa configurar os outros parametros
        // return $this->hasMany(State::class);

        # ou usamos com os parametros
        return $this->hasMany(State::class, 'country_id', 'id');
    }

}
