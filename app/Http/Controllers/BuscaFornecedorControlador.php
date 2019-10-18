<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;


class BuscaFornecedorControlador extends Controller
{
    public function filtrar(Request $request, Fornecedor $fornecedores){

        $fornecedores = $fornecedores->newQuery();

        if($request->filled('nomeFornecedor')):
            $fornecedores->where('nome', 'like' , "%".$request->input('nomeFornecedor')."%");
        endif;

        if($request->filled('cpf_cnpj')):
            
            if(strlen($request->input('cpf_cnpj')) < 15):
                $fornecedores->join('fornecedores_pessoa_fisica', 'fornecedores.id', '=', 'fornecedores_pessoa_fisica.fornecedor_id');
                $fornecedores->where('cpf', $request->input('cpf_cnpj'));
            else:
                $fornecedores->join('fornecedores_pessoa_juridica', 'fornecedores.id', '=', 'fornecedores_pessoa_juridica.fornecedor_id');
                $fornecedores->where('cnpj', $request->input('cpf_cnpj'));
            endif;
        endif;

        if($request->filled('data_cadastro_inicial')):
            $fornecedores->whereDate('created_at', '>=', $request->input('data_cadastro_inicial'));
        endif;

        if($request->filled('data_cadastro_final')):
            $fornecedores->whereDate('created_at', '<=', $request->input('data_cadastro_final'));
        endif;

        $fornecedores = $fornecedores->paginate(5);

        return view('fornecedor.fornecedores', compact('fornecedores'));
    }
}
