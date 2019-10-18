<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FornecedorPessoaFisica extends Model
{
    protected $table = 'fornecedores_pessoa_fisica';
    public $timestamps = false;

    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }
}
