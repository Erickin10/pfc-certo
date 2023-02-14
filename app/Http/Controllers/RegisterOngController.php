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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $data = [
            'cep' => $request['cep'],
            'rua' => $request['rua'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'complemento' => $request['complemento'],
            'numero' => $request['numero'],
            'estado' => $request['estado'],
        ];

        //EnderecoOng::create($data);
        //$id_Endereco = EnderecoOng::catchIdEndereco($data);
        $endereco = EnderecoOng::create($data);
        $id_Endereco = $endereco->getKey();

        $data2 = [
            'name' => $request['name'],
            'email' => $request['email'],
            'description' => $request['description'],
            'phone' => $request['phone'],
            'cnpj' => $request['cnpj'],
            'id_Endereco' => $id_Endereco,
            'aproved' => false
        ];

        Ong::create($data2);;

        return redirect()->route('site.cadastro-ong-feito');

    }
}
