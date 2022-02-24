@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Añadir nueva categoria') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/categoria') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="Titulo"  class="col-md-2 col-form-label text-md-right">{{ __('Nombre de la categoria') }}</label>

                            <div class="col-md-10">
                                <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre de la categoria" autofocus>

                               
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
                                    {{ __('Guardar categoria') }}
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
