<?php

use App\Http\Controllers\RegisterOngController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\GaleriaController;
use App\Http\Controllers\Site\PostarPerdidoController;
use App\Http\Controllers\Site\PostarAchadoController;
use App\Http\Controllers\Site\PerfilController;
use App\Http\Controllers\Site\OngsController;
use App\Http\Controllers\Site\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware('auth')->namespace('Site')->group(function (){

    // Routas da Galeria
    Route::get('galeria', [GaleriaController::class, 'index']) -> name('site.galeria');
    Route::get('galeria/achado/{post}', [GaleriaController::class, 'achado']) -> name ('site.galeria.achado.post-individual');
    Route::get('galeria/perdido/{post}', [GaleriaController::class, 'perdido']) -> name ('site.galeria.perdido.post-individual');

    // Rotas das Ongs
    Route::get('ongs', [OngsController::class, 'index']) -> name('site.ong');
    Route::delete('ongs/delete/{id}', [OngsController::class,'destroy']) -> name('site.ong.deletar');
    Route::patch('ongs/approve/{id}', [OngsController::class,'approve']) -> name('site.ong.aprovar');
    Route::get('ongs/edit/{id}', [OngsController::class,'edit']) -> name('site.ong.editar');
    Route::put('ongs/update/{id}', [OngsController::class,'update']) -> name('site.ong.editar.postar');


    // Rotas de gerenciamento de Posts
    Route::get('posts-confirmacao', [PostController::class, 'index']) -> name('site.confirmacao');

    Route::delete('post-achado/{id}', [PostController::class,'destroyAchado']) -> name('site.post-achado.deletar');
    Route::patch('post-achado/{id}', [PostController::class,'approveAchado']) -> name('site.post-achado.aprovar');

    Route::delete('post-perdido/{id}', [PostController::class,'destroyPerdido']) -> name('site.post-perdido.deletar');
    Route::patch('post-perdido/{id}', [PostController::class,'approvePerdido']) -> name('site.post-perdido.aprovar');

    // Routas de 'concluidos'
    Route::view('post-feito', 'site.post-feito') -> name('site.post-feito');
    Route::view('cadastro-feito', 'site.cadastro-feito') -> name('site.cadastro-feito');

    //Routas de Posts

    //Cadastrar
    Route::get('postar-achado', [PostarAchadoController::class, 'index']) -> name('site.postar-achado');
    Route::post('postar-achado/store', [PostarAchadoController::class, 'formAchado']) -> name('site.postar-achado.form');

    Route::get('postar-perdido', [PostarPerdidoController::class, 'index']) -> name('site.postar-perdido');
    Route::post('postar-perdido/store', [PostarPerdidoController::class, 'formPerdido']) -> name('site.postar-perdido.form');

    //Editar
    Route::get('editar-achado/edit/{id}', [PostarAchadoController::class, 'edit']) -> name('site.editar-achado');
    Route::put('editar-achado/update/{id}', [PostarAchadoController::class, 'update'])->name('site.editar-achado.postar');

    Route::get('editar-perdido/edit/{id}', [PostarPerdidoController::class, 'edit']) -> name('site.editar-perdido');
    Route::put('editar-perdido/update/{id}', [PostarPerdidoController::class, 'update'])->name('site.editar-perdido.postar');


    // Routas do Perfil
    Route::get('perfil', [PerfilController::class, 'index']) -> name('site.perfil');
    Route::get('perfil/meus-posts', [PerfilController::class, 'show']) -> name('site.perfil.meus-posts');
    Route::put('/atualizar-dados/{enderecoUser_id}', [PerfilController::class, 'update'])->name('site.perfil.editar');
});

// Routas dos Cadastros
Route::get('cadastrar-ong', [RegisterOngController::class, 'index']) -> name('site.cadastrar-ong');
Route::post('cadastrar-ong/store', [RegisterOngController::class, 'createOng']) -> name('site.cadastrar-ong.form');
Route::view('cadastro-ong-feito', 'site.cadastro-ong-feito') -> name('site.cadastro-ong-feito');

// Routas do Login
Route::view('/', 'auth.login')-> name('site.login');

// Routas da Home
Auth::routes();
Route::middleware('auth')->get('/home', [HomeController::class, 'index'])->name('site.home');

// Routas do Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
