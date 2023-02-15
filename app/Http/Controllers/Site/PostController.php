<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\FoundAnimal;
use App\Models\LostAnimal;
use App\Models\FoundImage;
use App\Models\LostImage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.galeria-confirmacao',['postsAchado'=>FoundAnimal::all()],['postsPerdido'=>LostAnimal::all()]);
    }



    public function achado (FoundAnimal $post)
    {
        return view('site.post-achado-individual',['post' => $post]);
    }

    public function perdido (LostAnimal $post)
    {

        return view('site.post-perdido-individual',['post' => $post]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAchado($id){

        $postAchado = FoundAnimal::find($id);
        $imageA = FoundImage::where([['id_Achado', 'like', $postAchado->id]])->get();
        foreach ($imageA as $image) {
            $image->delete();
        }
        $postAchado->delete();

    return redirect()->route('site.galeria')->with('success', 'Post excluído com sucesso.');
    }

    public function approveAchado($id){

        $postAchado = FoundAnimal::find($id);
        $postAchado->aproved = true;
        $postAchado->save();

        return redirect()->back()->with('success', 'Post aprovada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPerdido($id){

        $postPerdido = LostAnimal::find($id);
        $imageP = LostImage::where([['id_Perdido', 'like', $postPerdido->id]])->get();
        foreach ($imageP as $image) {
            $image->delete();
        }
        $postPerdido->delete();

    return redirect()->route('site.galeria')->with('success', 'Post excluído com sucesso.');
    }

    public function approvePerdido($id){

        $postPerdido = LostAnimal::find($id);
        $postPerdido->aproved = true;
        $postPerdido->save();

        return redirect()->back()->with('success', 'Post aprovada com sucesso.');
    }

}
