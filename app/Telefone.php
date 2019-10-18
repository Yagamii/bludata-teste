<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    public $timestamps = false;
    
    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }
}
