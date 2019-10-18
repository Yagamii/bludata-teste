@extends('layout.layout')

@section('body')

@if(session('error'))
<div class="alert alert-danger" role="alert">
    {{session('error')}}
</div>
@endif

<h2 class="titulo">Novo Fornecedor</h2>

    <div class="form-check form-check-inline offset-md-5">
        <input class="form-check-input" type="radio" onchange="esconderPessoaJuridica(this)" checked name="radioTipoPessoa" id="radioPessoaFisica" value="pessoaFisica">
        <label class="form-check-label" for="radioPessoaFisica">
            Pessoa Física
        </label>
    </div>
    <div class=" form-check form-check-inline">
        <input class="form-check-input" type="radio" onchange="esconderPessoaFisica(this)" name="radioTipoPessoa" id="radioPessoaJuridica" value="pessoaJuridica">
        <label class="form-check-label" for="radioPessoaJuridica">
            Pessoa Jurídica
        </label>
    </div>

    <!-- Formulario pessoa física -->
    <form class="col-md-4 offset-md-4" id="pessoaFisica" method="POST" action="/fornecedores/novo">
        @csrf
        <div class="form-group">
            <label for="empresa">Empresa</label>
            <select class="form-control" id="empresa" name="empresa">
                @foreach($empresas as $empresa)
                    <option value="{{$empresa->id}}" {{old('empresa') === $empresa->id ? 'selected' : ''}}>{{$empresa->nome_fantasia}}</option>
                @endforeach
            </select>
        </div>
            
        <div class="form-group">
            <label for="nomeFornecedor">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor" 
            placeholder="Nome do Fornecedor" value="{{old('nomeFornecedor')}}" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" 
            placeholder="123.456.789-99" value="{{old('cpf')}}" maxlength="14"
            onkeypress="formatarCampo('###.###.###-##', this)" required>
        </div>
        <div class="form-group">
            <label for="rg">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" 
            placeholder="12.458.874-87" value="{{old('rg')}}" maxlength="13"
            onkeypress="formatarCampo('##.###.###-##', this)" required>
        </div>
        <div class="form-group">
            <label for="dataNascimento">Data de nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" class="form-control" 
            value="{{old('dataNascimento')}}" required/>
        </div>
        <div class="form-group" id="telefoneFisico">
            <label for="telefone">Telefone:</label>
                <button class="btn btn-primary btn-sm adicionarTelFisico">
                    <i class="fas fa-plus fa-lg"></i>
                </button>
            <div class="input-group telefoneFisico">         
                <input type="tel" class="form-control" placeholder="(12) 34567-8910" name="telefone[]"
                 pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"
                  required>
            </div>
            
        </div>
        <input type="hidden" name="tipoPessoa" value="pessoaFisica">
        <button type="submit" class="btn btn-primary offset-md-5">Cadastrar</button>
    </form>


    <!-- Formulario pessoa jurídica -->
    <form class="col-md-4 offset-md-4" id="pessoaJuridica" style="display: none" method="POST" action="/fornecedores/novo">
        @csrf
        <div class="form-group">
            <label for="empresa">Empresa</label>
            <select class="form-control" id="empresa" name="empresa">
                @foreach($empresas as $empresa)
                    <option value="{{$empresa->id}}" {{old('empresa') === $empresa->id ? 'selected' : ''}}>{{$empresa->nome_fantasia}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nomeFornecedor">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor" 
            placeholder="Nome do Fornecedor" value="{{old('nomeFornecedor')}}" required>
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" 
            placeholder="11.111.111/1111-11" value="{{old('cnpj')}}" maxlength="18"
            onkeypress="formatarCampo('##.###.###/####-##', this)" required>
        </div>
        <div class="form-group" id="telefoneJuridico">
                <label for="telefoneJuridico">Telefone:</label>
                    <button class="btn btn-primary btn-sm adicionarTelJuridico">
                        <i class="fas fa-plus fa-lg"></i>
                    </button>
                <div class="input-group telefoneJuridico">         
                    <input type="tel" class="form-control" placeholder="(12) 34567-8910" name="telefone[]" 
                    pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" required>
                </div>    
            </div>
            <input type="hidden" name="tipoPessoa" value="pessoaJuridica">
        <button type="submit" class="btn btn-primary offset-md-5">Cadastrar</button>
    </form>

@endsection