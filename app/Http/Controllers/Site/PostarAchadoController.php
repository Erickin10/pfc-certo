<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\FoundAnimal;
use Illuminate\Http\Request;

class PostarAchadoController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.postar-achado');
    }

    public function formAchado(Request $request){

        //dd($request);

        /*$request->validate([

            'nameAnimal'=>'required',


        ]);*/

        $data = $request->post();

        if($request->hasFile('img_Animal') && $request->file('img_Animal')->isValid()){

            $requestImage = $request->img_Animal;

            $extension  = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/posts-achados'), $imageName);

            $name = 'img/posts-achados/' . $imageName;

            $data['img_Animal'] = $name;

        }

        $data['aproved'] = false;
        // $data['local_Animal'] = $request->local_Animal;

        FoundAnimal::create($data);
        return redirect()->route('site.post-feito');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = FoundAnimal::findOrFail($id);
        return view('site.editar-achado',['post'=>$post]);
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

        $data = FoundAnimal::findOrFail($id);

        if($request->hasFile('img_Animal') && $request->file('img_Animal')->isValid()){

            $requestImage = $request->img_Animal;

            $extension  = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/posts-perdidos'), $imageName);

            $name = 'img/posts-perdidos/' . $imageName;

            $data['img_Animal'] = $name;

        }

        $data->update([
            'type_Animal' => $request->type_Animal,
            'name_Animal' => $request->name_Animal,
            'breed_Animal' => $request->breed_Animal,
            'color_Animal' => $request->color_Animal,
            'age_Animal' => $request->age_Animal,
            'gender_Animal' => $request->gender_Animal,
            'size_Animal' => $request->size_Animal,
            'img_Animal' => $data['img_Animal'],
            'local_Found_Animal' => $request->local_Found_Animal,
            'post_Description' => $request->post_Description,
            'local_Animal' => $request->local_Animal,
            'aproved' => false

        ]);

        return redirect()->route('site.perfil.meus-posts');

    }

}
