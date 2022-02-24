<?php

namespace App\Http\Controllers;

use DB;
use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Datos_categorias = request()->input('user');
        $categorias['categoria'] = DB::table('categorias')->where('user', $Datos_categorias)->get();

    
        return view('categorias.index' , $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        


        return view('categorias.crear');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $DatosCat = request()->except('_token');
        categoria::insert($DatosCat);


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
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $categoria = categoria::findOrFail($id);

        return view('categorias.editar', compact('categoria') );
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $Datos = request()->except('_token','_method');

       categoria::where('id','=', $id)->update($Datos);
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
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         categoria::destroy($id);

         $favo['favorlis'] = DB::table('favoritos')
         ->select('favoritos.id','favoritos.titulo','favoritos.descripcion', 'favoritos.url', 'categorias.nombre')
         ->join('categorias', 'categorias.id', '=', 'favoritos.id_categoria' )
         ->where('favoritos.publico', '1')
         ->take(10)
         ->get();
 
         return view('home',$favo);

        
    }
}
