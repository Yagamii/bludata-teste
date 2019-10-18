<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FornecedorPessoaJuridica extends Model
{
    protected $table = 'fornecedores_pessoa_juridica';
    public $timestamps = false;

    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }
}
