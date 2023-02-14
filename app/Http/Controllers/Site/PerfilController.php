<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\FoundAnimal;
use App\Models\LostAnimal;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EnderecoUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        /*$usuario = Auth::user()->id;

        //return view('site.perfil', ['users'=>User::all()], ['endereco_user'=>EnderecoUser::all()]);

        return view('site.perfil', ['endereco_user' => EnderecoUser::where([['id', 'like', $usuario]])->get()],
        ['users'=>User::all()]);*/

        return view ('site.perfil', ['endereco'=>User::all()], ['users'=>User::all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('site.meus-posts',['postsAchado'=>FoundAnimal::all()],['postsPerdido'=>LostAnimal::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $enderecoUser_id)
    {

        $endereco = EnderecoUser::findOrFail($enderecoUser_id);
        $endereco->update([
            'cep' => $request->input('cep'),
            'rua' => $request->input('rua'),
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'complemento' => $request->complemento,
            'numero' => $request->numero
        ]);

        //$id_Endereco = $endereco->getKey();

        $user = User::findOrFail($request->userId);


        //$user=User::where('id_Endereco', 'like', $id_Endereco);



        $user->update([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return view('site.perfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
