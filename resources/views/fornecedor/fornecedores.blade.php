@extends('layout.layout')

@section('body')

<h2 class="titulo">Listagem de fornecedores</h2>

<form method="POST" action="/fornecedores/busca">
  @csrf
  <div class="row">
    <div class="col-md-3 form-group">
      <label for="nome">Nome:</label>
        <input type="text" id="nomeFornecedor" name="nomeFornecedor" placeholder="Nome do fornecedor" 
        class="form-control" value="{{request()->input('nomeFornecedor')}}" required />
    </div>
    <div class="col-md-3 form-group">
      <label for="cpf_cnpj">CPF/CNPJ:</label>
        <input type="text" id="cpf_cnpj" name="cpf_cnpj" placeholder="123.456.789-00 ou 12.345.678/9101-12" 
        class="form-control" value="{{request()->input('cpf_cnpj')}}"/>
    </div>
    <div class="col-md-3 form-group">
      <label for="data_cadastro_inicial">Cadastro a partir de:</label>
        <input type="date" id="data_cadastro_inicial" name="data_cadastro_inicial" 
        class="form-control" value="{{request()->input('data_cadastro_inicial')}}"/>
        {{request()->input('data_cadastro_inicial')}}
    </div>
    <div class="col-md-3 form-group">
      <label for="data_cadastro_final">Cadastrados até:</label>
        <input type="date" id="data_cadastro_final" name="data_cadastro_final" 
        class="form-control" value="{{request()->input('data_cadastro_final')}}"/>
    </div>
    </div>
    <div class="row">
      <div class="col-md-10 form-group botaoFiltrar">
        <button class="btn btn-secondary" type="submit">Filtrar</button>
      </div> 
    </div>
  </div>
</form>

  <div class="col-md-2 offset-md-10 novofornecedorBotao">
    <a href="/fornecedores/novo"><button class="btn btn-primary">+ Novo Fornecedor</button></a>
  </div>

<table class="col-md-12 table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF/CNPJ</th>
        <th scope="col">Empresa</th>
        <th scope="col">Data de cadastro</th>
        <th scope="col">Contato</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($fornecedores as $fornecedor)
      <tr>
        <td scope="row">{{$fornecedor->id}}</td>
        <td>{{$fornecedor->nome}}</td>
        @if($fornecedor->tipo === 'F')
          <td>{{$fornecedor->fornecedorFisico->cpf}}</td>
        @else
          <td>{{$fornecedor->fornecedorJuridico->cnpj}}</td>
        @endif
        <td>{{$fornecedor->empresa->nome_fantasia}}</td>
        <td>{{$fornecedor->created_at}}</td>
        <td>
            @foreach($fornecedor->telefone as $telefone)
              {{$telefone->numero}}{{!$loop->last ? ',' : ''}}
            @endforeach
        </td>
        <td>
            <a href="/fornecedores/editar/{{$fornecedor->id}}"><i class="fas fa-edit fa-lg"></i></a>
            <a href="/fornecedores/apagar/{{$fornecedor->id}}" class="botaoApagar"><i class="fas fa-trash-alt fa-lg"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mx-auto" style="width: 200px;">{{$fornecedores->links()}}</div>

@endsection