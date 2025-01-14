<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContasPagar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ContasPagarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');  
    }

    public function listar()
    {
        $contas_pagar = ContasPagar::all();
        return view('listar')->with('contas_pagar', $contas_pagar);
    }

    public function cadastro()
    {
        return view('cadastro');
    }

    public function editar($id)
    {
        $contas_pagar = ContasPagar::find($id);

        if (empty($contas_pagar)) {
            return 'Conta Pagar não existe!';
        } else {
            return view('editar')->with('contas_pagar', $contas_pagar);
        }
    }

    public function reorganizeIds()
    {
        $contas_pagar = ContasPagar::orderBy('id')->get(); 
        $counter = 1; 
        foreach ($contas_pagar as $conta) {
            $conta->id = $counter; 
            $conta->save(); 
            $counter++; 
        }
    }

    public function resetAutoIncrement()
    {
        DB::statement('ALTER TABLE contas_pagar AUTO_INCREMENT = 1');
    }
    public function apagar($id)
    {
        $conta = ContasPagar::find($id);
        if ($conta) {
            $conta->delete();
            $this->reorganizeIds();
            $this->resetAutoIncrement();

            return redirect()->route('contas')->with('success', 'Conta apagada com sucesso!');
        } else {
            return redirect()->route('contas')->with('error', 'Conta não encontrada!');
        }
    }

    public function update($id, Request $request)
    {
        $descricao = $request->input('descricao');
        $valor = $request->input('valor');

        $contas_pagar = ContasPagar::find($id);
        $contas_pagar->descricao = $descricao;
        $contas_pagar->valor = $valor;
        $contas_pagar->save();

        return redirect()->action('ContasPagarController@listar')->withInput();
    }

    public function salvar(Request $request)
    {
        $descricao = $request->input('descricao');
        $valor = $request->input('valor');

        $validator = Validator::make(
            [
                'descricao' => $descricao,
                'valor' => $valor
            ],
            [
                'descricao' => 'required|min:6',
                'valor' => 'required|numeric'
            ],
            [
                'required' => ':attribute é obrigatório.',
                'numeric' => ':attribute precisa ser numérico.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->action('ContasPagarController@cadastro')
                ->withErrors($validator)
                ->withInput();
        }

        $contas_pagar = new ContasPagar();
        $contas_pagar->descricao = $descricao;
        $contas_pagar->valor = $valor;
        $contas_pagar->save();

        return redirect()->action('ContasPagarController@listar')->withInput();
    }
    
}
