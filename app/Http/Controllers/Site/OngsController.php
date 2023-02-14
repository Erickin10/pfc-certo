<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ong;
use App\Models\EnderecoOng;

class OngsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $search = request('search');

        if($search == ""){

            $search = "Todas";

        }
        if($search == "Todas"){

            return view('site.ongs', ['ongs'=>Ong::all()], ['endereco_ong'=>EnderecoOng::all()]);

        }else{

            /*$endereco_ong = EnderecoOng::where([['cidade', 'like', $search]]);

            //$id_endereco_ong = $ong->id_Endereco;

            $ong= Ong::where([['id_Endereco', 'like', $endereco_ong->id]]);

            return view('site.ongs', ['ongs' => $ong], ['endereco_ong' => $endereco_ong]);*/





            /*$endereco_ong = EnderecoOng::where([['cidade', 'like', $search]])->first();

            dd($endereco_ong);
            if ($endereco_ong) {
                $ong = Ong::where([['id_Endereco', 'like', $endereco_ong->id]])->first();

                return view('site.ongs', ['ongs' => $ong], ['endereco_ong' => $endereco_ong]);
            }*/

            return view('site.ongs', ['endereco_ong' => EnderecoOng::where([['estado', 'like', $search]])->get()],
            ['ongs'=>Ong::all()]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco_ong=EnderecoOng::findOrFail($id);

        return view('site.editar-ong',['endereco_ong'=>$endereco_ong], ['ong'=>Ong::all()]);
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
         $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $endereco = EnderecoOng::findOrFail($id);
        $endereco->update([
            'cep' => $request->cep,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'complemento' => $request->complemento,
            'numero' => $request->numero
        ]);

        $ong = Ong::findOrFail($request->idOng);

        $ong->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'phone' => $request->phone,
            'cnpj' => $request->cnpj,
        ]);

        return redirect()->route('site.ong');
    }

    public function approve($id){

    $ong = Ong::find($id);
    $ong->aproved = true;
    $ong->save();

    return redirect()->back()->with('success', 'Ong aprovada com sucesso.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){



        $ong = Ong::find($id);

        $endereco_ong = $ong->id_Endereco;

        $endereco = EnderecoOng::where('id', $endereco_ong)->first();


        $ong->delete();
        $endereco->delete();

    return redirect()->route('site.ong')->with('success', 'Ong excluída com sucesso.');
    }
}
