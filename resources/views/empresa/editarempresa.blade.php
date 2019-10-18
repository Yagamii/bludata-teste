@extends('layout.layout')

@section('body')

    <h2 class="titulo">Editar {{$empresa->nome_fantasia}}</h2>

    <div class="col-md-4 offset-md-4">
        <form action="/empresas/{{$empresa->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeEmpresa">Nome da empresa</label>
                <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" value="{{$empresa->nome_fantasia}}">
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{$empresa->cnpj}}">
            </div>
            <div class="form-group">
                <label for="estado">UF</label>
                <select class="form-control" id="estado" name="estado">
                    @foreach($estados as $estado)
                        <option value="{{$estado->id}}" {{$empresa->estado_id === $estado->id ? 'selected' : ''}}>{{$estado->sigla}}</option>
                   @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary offset-md-5">Cadastrar</button>
        </form>
    </div>

@endsection