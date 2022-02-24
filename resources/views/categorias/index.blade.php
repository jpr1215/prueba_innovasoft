@extends('layouts.app')

@section('content')
<div class="container">


    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categorias') }}</div>


 <form action="{{ route('categoria.create') }}">
                     <input type="hidden" name="user" value=" {{ Auth::user()->id }}">
                   <button type="submit" type="button" class=" col-md-12 btn btn-primary">Añadir nueva categoria</button>
                   </form> 


    

    
        <table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">nombre</th>
    

    </tr>
  </thead>
  <tbody>
    @foreach($categoria as $catego)
    <tr>
      
      <td>{{ $catego->nombre }}</td>
     

      <td>
          <form  action="{{ url('/categoria/'. $catego->id.'/edit')}}">
            
            <button type="submit" class="btn btn-warning" >Editar</button>
          </form>
      </td>
      <td>
          <form method="post" action="{{ url('/categoria/'. $catego->id)}}">
            @csrf
            {{ method_field('DELETE')}}
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres borrar esta categoria?')" >Borrar</button>
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
