@extends('layouts.app')

@section('content')
<div class="container">


    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sitios web favoritos') }}</div>



 <form action="{{ route('favorito.create') }}">
                     <input type="hidden" name="user" value=" {{ Auth::user()->id }}">
                   <button type="submit" type="button" class=" col-md-12 btn btn-primary">Añadir nuevo sitio web</button>
                   </form>


    
        <table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Titulo</th>
      <th scope="col">descripcion</th>
      <th scope="col">Sitio</th>
      <th scope="col">Categoria</th>

       <th scope="col"></th>
     <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    @foreach($favorlis as $favorito)
    <tr>
      
      <td>{{ $favorito->titulo }}</td>
      <td>{{ $favorito->descripcion }}</td>
      <td><a href="{{ $favorito->url }}"><button class="btn btn-primary">Ir</button></a> </td>
      <td>{{ $favorito->nombre }}</td>


      <td>
          <form  action="{{ url('/favorito/'. $favorito->id.'/edit')}}">
            
            <button type="submit" class="btn btn-warning" >Detalles</button>
          </form>
      </td>
      <td>
          <form method="post" action="{{ url('/favorito/'. $favorito->id)}}">
            @csrf
            {{ method_field('DELETE')}}
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres borrar este sitio?')" >Borrar</button>
          </form>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
</div>
</div>

    </div>
</div>
@endsection
