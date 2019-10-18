<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Estado;

class EmpresaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::getEmpresas();

        return view('empresa.empresas', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::getEstados();
        
        return view('empresa.novaempresa', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa();
        $empresa->estado_id = $request->input('estado');
        $empresa->nome_fantasia = $request->input('nomeEmpresa');
        $empresa->cnpj = $request->input('cnpj');
        $empresa->save();

        return redirect('/empresas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estados = Estado::getEstados();
        $empresa = Empresa::find($id);
        if(isset($empresa)):
            return view('empresa.editarempresa', compact('empresa', 'estados'));
        endif;
        return redirect('/empresas');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        if(isset($empresa)):
            $empresa->estado_id = $request->input('estado');
            $empresa->nome_fantasia = $request->input('nomeEmpresa');
            $empresa->cnpj = $request->input('cnpj');
            $empresa->save();
        endif;

        return redirect('/empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        if(isset($empresa)):
            $empresa->delete();
        endif;

        return redirect('empresas');
    }
}
