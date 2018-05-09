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
        return $this->hasMany(State::class);
    }

}
