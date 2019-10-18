@extends('layout.layout')

@section('body')

    <h2 class="titulo">Nova Empresa</h2>

    <div class="col-md-4 offset-md-4">
        <form action="/empresas/novo" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeEmpresa">Nome da empresa</label>
                <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="xx.xxx.xxx/xxxx.xx">
            </div>
            <div class="form-group">
                <label for="estado">UF</label>
                <select class="form-control" id="estado" name="estado">
                    @foreach($estados as $estado)
                         <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary offset-md-5">Cadastrar</button>
        </form>
    </div>

@endsection