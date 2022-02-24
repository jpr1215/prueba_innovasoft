<?php

namespace App\Http\Controllers;

use DB;
use App\Models\favoritos;
use Illuminate\Http\Request;


class FavoritosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Datos_Favoritos_listar = request()->input('user');
        $favo['favorlis'] = DB::table('favoritos')
        ->select('favoritos.id','favoritos.titulo','favoritos.descripcion', 'favoritos.url', 'categorias.nombre')
        ->join('categorias', 'categorias.id', '=', 'favoritos.id_categoria' )
        ->where('favoritos.user', $Datos_Favoritos_listar)
        ->where('favoritos.publico', '0')
        ->get();

    
        return view('sitios.listar' , $favo);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

         $id_usr = request()->input('user');
        $categorias['categoria'] = DB::table('categorias')->where('user', $id_usr )->get();

        return view('sitios.crear', $categorias);
            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $DatosFav = request()->except('_token');
       favoritos::insert($DatosFav);

       $favo['favorlis'] = DB::table('favoritos')
       ->select('favoritos.id','favoritos.titulo','favoritos.descripcion', 'favoritos.url', 'categorias.nombre')
       ->join('categorias', 'categorias.id', '=', 'favoritos.id_categoria' )
       ->where('favoritos.publico', '1')
       ->take(10)
       ->get();

       return view('home',$favo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    
    public function show(favoritos $favoritos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $favorito = favoritos::findOrFail($id);

        return view('sitios.editar', compact('favorito') );
    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $DatosFav = request()->except('_token','_method');

       favoritos::where('id','=', $id)->update($DatosFav);

       $favo['favorlis'] = DB::table('favoritos')
       ->select('favoritos.id','favoritos.titulo','favoritos.descripcion', 'favoritos.url', 'categorias.nombre')
       ->join('categorias', 'categorias.id', '=', 'favoritos.id_categoria' )
       ->where('favoritos.publico', '1')
       ->take(10)
       ->get();

       return view('home',$favo);
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        favoritos::destroy($id);

        $favo['favorlis'] = DB::table('favoritos')
       ->select('favoritos.id','favoritos.titulo','favoritos.descripcion', 'favoritos.url', 'categorias.nombre')
       ->join('categorias', 'categorias.id', '=', 'favoritos.id_categoria' )
       ->where('favoritos.publico', '1')
       ->take(10)
       ->get();

       return view('home',$favo);
    }
}
