<?php

namespace App\Http\Controllers;


use DB;
use App\Models\favoritos;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $favo['favorlis'] = DB::table('favoritos')
        ->select('favoritos.id','favoritos.titulo','favoritos.descripcion', 'favoritos.url', 'categorias.nombre')
        ->join('categorias', 'categorias.id', '=', 'favoritos.id_categoria' )
        ->where('favoritos.publico', '1')
        ->take(10)
        ->get();

        return view('home',$favo);
    }
}
