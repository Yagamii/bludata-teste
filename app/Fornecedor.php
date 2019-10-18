<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    public function scopegetFornecedores(){
        return $this->with('fornecedorFisico', 'fornecedorJuridico', 'empresa', 'telefone')->paginate(20);
    }

    public function fornecedorFisico(){
        return $this->hasOne('App\FornecedorPessoaFisica');
    }

    public function fornecedorJuridico(){
        return $this->hasOne('App\FornecedorPessoaJuridica');
    }

    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }

    public function telefone(){
        return $this->hasMany('App\Telefone');
    }
}
