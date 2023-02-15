<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\LostAnimal;
use App\Models\LostImage;
use Illuminate\Http\Request;

class PostarPerdidoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.postar-perdido');
    }

    public function formPerdido(Request $request){

        $data = $request->post();
        $data['aproved'] = false;

        $post = LostAnimal::create($data);
        $id_Perdido = $post->getKey();

        if ($request->hasFile('img_Animal')) {
            foreach ($request->file('img_Animal') as $image) {
                if ($image->isValid()) {
                    $extension  = $image->extension();
                    $imageName = $image->getClientOriginalName();
                    $imageName = md5($image->getClientOriginalName() . strtotime("now")) . "." . $extension;
                    $image->move(public_path('img/posts-achados'), $imageName);
                    $name = 'img/posts-achados/' . $imageName;

                    $img = [
                        'name_Img' => $name,
                        'id_Perdido' => $id_Perdido
                    ];

                    LostImage::create($img);
                }
            }

        }

        /*if($request->hasFile('img_Animal') && $request->file('img_Animal')->isValid()){

            $requestImage = $request->img_Animal;

            $extension  = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/posts-perdidos'), $imageName);

            $name = 'img/posts-perdidos/' . $imageName;

            $data['img_Animal'] = $name;

        }*/




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
        $post = LostAnimal::findOrFail($id);
        return view('site.editar-perdido',['post'=>$post]);
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

        $data = LostAnimal::findOrFail($id);

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
            'img_Animal' => $name,
            'local_Lost_Animal' => $request->local_Lost_Animal,
            'post_Description' => $request->post_Description,
            'bounty_Animal' => $request->bounty_Animal,
            'aproved' => false

        ]);

        return redirect()->route('site.perfil.meus-posts');

    }


}
