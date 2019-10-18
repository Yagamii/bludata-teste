<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }

    public function scopegetEstados(){

        return Estado::all();

    }
}
