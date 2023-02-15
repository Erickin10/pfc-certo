<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\FoundAnimal;
use App\Models\FoundImage;
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

        /*$request->validate([

            'nameAnimal'=>'required',


        ]);*/

        $data = $request->post();
        $data['aproved'] = false;

        $post = FoundAnimal::create($data);
        $id_Achado = $post->getKey();

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
                        'id_Achado' => $id_Achado
                    ];

                    FoundImage::create($img);
                }
            }

        }

        /*if($request->hasFile('img_Animal') && $request->file('img_Animal')->isValid()){

            $requestImage = $request->img_Animal;

            $extension  = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/posts-achados'), $imageName);

            $name = 'img/posts-achados/' . $imageName;

            $data['img_Animal'] = $name;

        }*/


        // $data['local_Animal'] = $request->local_Animal;


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
        $imageP = FoundImage::where([['id_Achado', 'like', $data->id]])->get();

        if ($request->hasFile('img_Animal')) {
            foreach ($request->file('img_Animal') as $key => $image) {
                if ($image->isValid()) {
                    $extension  = $image->extension();
                    $imageName = $image->getClientOriginalName();
                    $imageName = md5($image->getClientOriginalName() . strtotime("now")) . "." . $extension;
                    $image->move(public_path('img/posts-achados'), $imageName);
                    $name = 'img/posts-achados/' . $imageName;

                    $lostImage = $imageP[$key];
                    $lostImage->update(['name_Img' => $name]);
                }
            }

        }

        $data->update([
            'type_Animal' => $request->type_Animal,
            'name_Animal' => $request->name_Animal,
            'breed_Animal' => $request->breed_Animal,
            'color_Animal' => $request->color_Animal,
            'age_Animal' => $request->age_Animal,
            'gender_Animal' => $request->gender_Animal,
            'size_Animal' => $request->size_Animal,
            'local_Found_Animal' => $request->local_Found_Animal,
            'post_Description' => $request->post_Description,
            'local_Animal' => $request->local_Animal,
            'aproved' => false

        ]);

        return redirect()->route('site.perfil.meus-posts');

    }

}
