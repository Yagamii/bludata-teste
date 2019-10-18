@extends('layout.layout')

@section('body')

<h2 class="titulo">Editar Fornecedor: {{$fornecedor->nome}}</h2>

    <!-- Formulario pessoa jurídica -->
    <form class="col-md-4 offset-md-4" id="pessoaJuridica" method="POST" action="/fornecedores/{{$fornecedor->id}}">
        @csrf
        <div class="form-group">
            <label for="empresa">Empresa</label>
            <select class="form-control" id="empresa" name="empresa">
                @foreach($empresas as $empresa)
                    <option value="{{$empresa->id}}" {{$empresa->id === $fornecedor->empresa_id ? 'selected' : ''}}>{{$empresa->nome_fantasia}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nomeFornecedor">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor" value="{{$fornecedor->nome}}" required>
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" disabled value="{{$fornecedor->fornecedorJuridico->cnpj}}">
        </div>
        <div class="form-group" id="telefoneJuridico">
                <label for="telefoneJuridico">Telefone:</label>
                    <button class="btn btn-primary btn-sm adicionarTelJuridico">
                        <i class="fas fa-plus fa-lg"></i>
                    </button>
                @foreach($fornecedor->telefone as $telefone)
                    <div class="input-group telefoneJuridico">  
                            
                        <input type="tel" class="form-control" placeholder="(12) 34567-8910" name="telefone[{{$telefone->id}}]" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" value="{{$telefone->numero}}">
                        @if(!$loop->first)
                            <div class="input-group-append" >
                                <span class="input-group-text" >
                                    <button class="btn btn-danger btn-sm removerTelJuridico" style="font-size: 0.5rem">
                                        <i class="fas fa-minus fa-xs">
                                        </i>
                                    </button>
                                </span>
                            </div>
                        @endif
                    </div>
                @endforeach    
            </div>
            <input type="hidden" name="tipoPessoa" value="pessoaJuridica">
        <button type="submit" class="btn btn-primary offset-md-5">Cadastrar</button>
    </form>

@endsection