@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Editar categoria') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/categoria/'. $categoria->id) }}">
                        @csrf
                        {{ method_field('PATCH')}}

                        <div class="form-group row">
                            <label for="nombre"  class="col-md-2 col-form-label text-md-right">{{ __('nombre    ') }}</label>

                            <div class="col-md-10">
                                <input id="nombre" type="text" value="{{ $categoria->nombre}}" class="form-control" name="nombre" >

                               
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
