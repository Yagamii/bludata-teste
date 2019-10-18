<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Fornecedor;
use App\FornecedorPessoaFisica;
use App\FornecedorPessoaJuridica;
use App\Telefone;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class FornecedorControlador extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $fornecedores = Fornecedor::getFornecedores();

        return view('fornecedor.fornecedores', compact('fornecedores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::getEmpresas();

        return view('fornecedor.novofornecedor', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        try{

            if($request->tipoPessoa === 'pessoaFisica'):
                //Recebe a empresa do form para identificar caso a empresa for do Paraná, não permitir cadastro de fornecedor
                //pessoa fisica menor de idade
                $empresa = Empresa::with('estado')->where('id', $request->empresa)->first();
                if($this->verificarIdade($request->dataNascimento) < 18 && $empresa->estado->nome === 'Paraná')
                    throw new \Exception('O fornecedor precisar ter mais de 18 anos para ser cadastrado com essa empresa');

                $validarCampos = Validator::make($request->all(), [
                    'nomeFornecedor'=>'required',
                    'cpf'=>'required',
                    'rg'=>'required',
                    'dataNascimento' => 'required',
                    'telefone' => 'required'
                ]);

                if($validarCampos->fails())
                    throw new \Exception('Por favor não deixe nenhum campo em branco.');

                $fornecedor = new Fornecedor();
                $fornecedor->empresa_id = $request->empresa;
                $fornecedor->nome = $request->nomeFornecedor;
                $fornecedor->tipo = 'F';
                $fornecedor->save();

                $fornecedorFisico = new FornecedorPessoaFisica();
                $fornecedorFisico->fornecedor_id = $fornecedor->id;
                $fornecedorFisico->cpf = $request->cpf;
                $fornecedorFisico->rg = $request->rg;
                $fornecedorFisico->nascimento = $request->dataNascimento;
                $fornecedorFisico->fornecedor()->associate($fornecedor);
                $fornecedorFisico->save();

                for($i = 0; $i < count($request->telefone); $i++):
                    $telefone = new Telefone();
                    $telefone->fornecedor_id = $fornecedor->id;
                    $telefone->numero = $request->telefone[$i];
                    $telefone->save();
                endfor;

                return redirect('/fornecedores');
            else:
                $validarCampos = Validator::make($request->all(), [
                    'nomeFornecedor'=>'required',
                    'cnpj'=>'required',
                    'telefone' => 'required'
                ]);

                if($validarCampos->fails())
                    throw new \Exception('Por favor não deixe nenhum campo em branco.');

                $fornecedor = new Fornecedor();
                $fornecedor->empresa_id = $request->empresa;
                $fornecedor->nome = $request->nomeFornecedor;
                $fornecedor->tipo = 'J';
                $fornecedor->save();

                $fornecedorJuridico = new FornecedorPessoaJuridica();
                $fornecedorJuridico->fornecedor_id = $fornecedor->id;
                $fornecedorJuridico->cnpj = $request->cnpj;
                $fornecedorJuridico->fornecedor()->associate($fornecedor);
                $fornecedorJuridico->save();

                for($i = 0; $i < count($request->telefone); $i++):
                    $telefone = new Telefone();
                    $telefone->fornecedor_id = $fornecedor->id;
                    $telefone->numero = $request->telefone[$i];
                    $telefone->save();
                endfor;

                return redirect('/fornecedores');
            endif;
        }catch(\Exception $e){
            return redirect()->back()->withInput($request->all())->withError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresas = Empresa::getEmpresas();
        $fornecedor = Fornecedor::find($id);
        
        if($fornecedor->tipo === 'F'):
            $fornecedor = $fornecedor->with('fornecedorFisico', 'telefone')->where('id', $id)->first();
            
            return view('fornecedor.editarfornecedorfisico', compact('fornecedor', 'empresas'));
        else:
            $fornecedor = $fornecedor->with('fornecedorJuridico', 'telefone')->where('id', $id)->first();

            return view('fornecedor.editarfornecedorjuridico', compact('fornecedor', 'empresas'));
        endif;

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
        $fornecedor = Fornecedor::find($id);
        
        $fornecedor->nome = $request->input('nomeFornecedor');

        $telefone = $fornecedor->telefone()->get();
        
        $telForm = $request->input("telefone");

        foreach($telefone as $index => $telDb):
            $telArray[] = $telDb->numero;
        endforeach;
        
        $this->verificarTelefone($telefone, $telForm, $telArray, $id);

        $fornecedor->save();
    
        return redirect('/fornecedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedor::find($id);

        if(isset($fornecedor)):
            $fornecedor->telefone()->delete();
            $fornecedor->fornecedorFisico()->delete();
            $fornecedor->fornecedorJuridico()->delete();
            $fornecedor->delete();
        endif;

        return redirect('/fornecedores');

    }

    public function verificarTelefone($telDb, $telForm, $telArray, $id){
        //Verifica cada numero do formulario se esta presente no array de numeros do banco de dados, caso não esteja será adicionado
        foreach($telForm as $tel):
            if(!in_array($tel, $telArray)):
                $novoTelefone = new Telefone();
                $novoTelefone->fornecedor_id = $id;
                $novoTelefone->numero = $tel;
                $novoTelefone->save();
            endif;
        endforeach;
        //Verifica se numero que esta no banco de dados esta presente no formulario, caso não esteja será apagado
        foreach($telDb as $tel):
            if(!in_array($tel->numero, $telForm)):
                $tel->delete();
            endif;
        endforeach;
    }

    public function verificarIdade($nascimento){
        $idade = Carbon::parse($nascimento)->age;

        return $idade;
    }
    
}
