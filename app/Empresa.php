<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $timestamps = false;

    public function estado(){
        return $this->hasOne('App\Estado', 'id', 'estado_id');
    }

    public function fornecedor(){
        return $this->hasMany('App\Fornecedor');
    }

    public function scopegetEmpresas(){

        return self::with('estado')->get();

    }
}
