<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    protected $fillable = ['latitude','longitude'];
    public function country()
    {
        //return $this->belongsTo(Country::class, 'country_id','id_country');
        return $this->belongsTo(Country::class);

    }
}
