@extends('layout.layout')

@section('body')

<h2 class="titulo">Listagem de empresas</h2>

    <div class="col-md-2 form-group float-right novofornecedorBotao">
        <a href="/empresas/novo"><button class="btn btn-primary">+ Nova Empresa</button></a>
    </div>

<table class="col-md-12 table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Empresa</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Estado</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empresas as $empresa)
        <tr>
                <td scope="row">{{$empresa->id}}</td>
                <td>{{$empresa->nome_fantasia}}</td>
                <td>{{$empresa->cnpj}}</td>
                <td>{{$empresa->estado->nome}}</td>
            <td>
                <a href="/empresas/editar/{{$empresa->id}}"><i class="fas fa-edit fa-lg"></i></a>
                <a href="/empresas/apagar/{{$empresa->id}}" class="botaoApagar"><i class="fas fa-trash-alt fa-lg"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>    
</table>

@endsection