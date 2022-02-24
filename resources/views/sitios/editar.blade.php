@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Favorito') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/favorito/'. $favorito->id) }}">
                        @csrf
                        {{ method_field('PATCH')}}

                        <div class="form-group row">
                            <label for="Titulo"  class="col-md-2 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-10">
                                <input id="titulo" type="text" value="{{ $favorito->titulo}}" class="form-control" name="titulo" >

                               
                            </div>
                        </div>

                           <div  class="form-group row">
                            <label style="margin-top: 10px" for="tema" class="col-md-2 col-form-label text-md-right">{{ __('descripcion') }}</label>

                            <div class="col-md-10">
                                <input style="margin-top: 10px" id="tema" type="text" value="{{ $favorito->descripcion}}" class="form-control" name="descripcion" >

                               
                            </div>
                        </div>

                           <div class="form-group row">
                            <label style="margin-top: 10px" for="url" class="col-md-2 col-form-label text-md-right">{{ __('URL') }}</label>

                            <div class="col-md-10">
                                <input style="margin-top: 10px" id="url" type="text"  value="{{ $favorito->url}}" class="form-control" name="url">

                               
                            </div>
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
                                    {{ __('Editar sitio') }}
                                </button>
                               

                              
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
