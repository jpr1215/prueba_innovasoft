<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/', function () {

    $favo['favorlis'] = DB::table('favoritos')
    ->select('favoritos.id','favoritos.titulo','favoritos.descripcion', 'favoritos.url', 'categorias.nombre')
    ->join('categorias', 'categorias.id', '=', 'favoritos.id_categoria' )
    ->where('favoritos.publico', '1')
    ->take(10)
    ->get();

    return view('welcome', $favo);
});

Auth::routes();


Route::resource('categoria', CategoriaController::class);

Route::resource('favorito', FavoritosController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
