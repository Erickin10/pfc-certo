<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ong;
use App\Models\EnderecoOng;
use Illuminate\Http\Request;

class RegisterOngController extends Controller
{

    public function index(){
        return view('site.cadastrar-ong');
    }

    public function createOng(Request $request){

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cep' => ['required', 'string', 'max:9'],
            'rua' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'complemento' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'integer'],
            'estado' => ['required', 'string', 'max:255'],
        ]);

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'description' => $request['description'],
            'phone' => $request['phone'],
            'cnpj' => $request['cnpj'],
            'aproved' => false
        ];

        $ong = Ong::create($data);
        $id_Ong = $ong->getKey();

        $data2 = [
            'cep' => $request['cep'],
            'rua' => $request['rua'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'complemento' => $request['complemento'],
            'numero' => $request['numero'],
            'estado' => $request['estado'],
            'id_Ong' => $id_Ong
        ];

        //EnderecoOng::create($data);
        //$id_Endereco = EnderecoOng::catchIdEndereco($data);
        EnderecoOng::create($data2);

        return redirect()->route('site.cadastro-ong-feito');
    }
}
