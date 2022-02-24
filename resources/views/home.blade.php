@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicio') }}</div>

                <form action="{{ url('/favorito') }}">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Bienvendo  {{ Auth::user()->name }}, aca podras ver listados algunos favoritos publicos</p>
                 

        <table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Titulo</th>
      <th scope="col">descripcion</th>
      <th scope="col">Sitio</th>
      <th scope="col">Categoria</th>

       

    </tr>
  </thead>
  <tbody>
    @foreach($favorlis as $favorito)
    <tr>
      
      <td>{{ $favorito->titulo }}</td>
      <td>{{ $favorito->descripcion }}</td>
      <td><a href="{{ $favorito->url }}"><button class="btn btn-primary">Ir</button></a> </td>
      <td>{{ $favorito->nombre }}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>

                   </div>
                   <input type="hidden" name="user" value=" {{ Auth::user()->id }}">
                   <button type="submit" type="button" class=" col-md-12 btn btn-primary">Ver favoritos privados</button>
                   </form>
                   <form action="{{ url('/categoria') }}">
                     <input type="hidden" name="user" value=" {{ Auth::user()->id }}">
                   <button type="submit" type="button" class=" col-md-12 btn btn-primary">Ver categorias</button>
                   </form>

            </div>
        </div>
    </div>
</div>
@endsection
