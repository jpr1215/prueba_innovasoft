@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Añadir nuevo favorito') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/favorito') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="Titulo"  class="col-md-2 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-10">
                                <input id="titulo" type="text" class="form-control" name="titulo" placeholder="Titulo del favorito" autofocus>

                               
                            </div>
                        </div>

                           <div  class="form-group row">
                            <label style="margin-top: 10px" for="tema" class="col-md-2 col-form-label text-md-right">{{ __('descripcion') }}</label>

                            <div class="col-md-10">
                                <input style="margin-top: 10px" id="tema" type="text" class="form-control" name="descripcion" placeholder="Descripcion del favorito" autofocus>

                               
                            </div>

                        </div>


 <div  class="form-group row">
                            <label style="margin-top: 10px" for="tema" class="col-md-2 col-form-label text-md-right">{{ __('categoria') }}</label>

                            <select style="margin-top: 10px" id="url" type="text" class="form-control col-md-10" name="id_categoria">
  @foreach($categoria as $catego)


    <option value="{{$catego->id}}">{{$catego->nombre}}</option>


      @endforeach
    </select>
                            

                        </div>




                           <div class="form-group row">
                            <label style="margin-top: 10px" for="url" class="col-md-2 col-form-label text-md-right">{{ __('URL') }}</label>

                            <div class="col-md-10">
                                <input style="margin-top: 10px" id="url" type="text" class="form-control" name="url" placeholder="Ejemplo:https://www.google.com/webhp?hl=es-419&sa=X&ved=0ahUKEwi5qNmIw5j2AhVTTjABHVKBCugQPAgI " autofocus>

                               
                            </div>
                        </div>

                        <div  class="form-group row">
                            <label style="margin-top: 10px" for="tema" class="col-md-2 col-form-label text-md-right">{{ __('publico') }}</label>


 

<select  style="margin-top: 10px" id="url" type="text" class="form-control col-md-10" name="publico">
    <option value="1">si</option>
    <option value="0">no</option>
</select>

      

                            

                        </div>

                          <input  type="hidden"  name="user" value="{{ Auth::user()->id }}">
                        

                       

                        <div style="margin-top: 10px" >
                            <div class=" offset-md-3">

                                 <a href="{{ route('home') }}">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Cancelar') }}
                                </button>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar sitio') }}
                                </button>
                               

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
