@extends('layouts.app')


@section('styles')


@endsection

@section('hero')

    <div class="hero-categorias">
        <form class="container h-100" action="{{ route('buscar.show') }}">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Encuentra tu proximo platillo</p>
                <input type="search" name="buscar" class="form-control" placeholder="Buscar alguna receta">
                </div>
            </div>
        </form>
    </div>

@endsection

@section('content')



    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas màs Recientes</h2>
        
        <div class="row">
            @foreach ($nuevas as $nueva)
            <div class="col-md-4">
                <div class="card">
                    <img src="/storage/{{ $nueva->imagen }}" class="card-img-top">

                    <div class="card-body">
                        <h3 class="text-uppercase">{{ $nueva->titulo }}</h3>

                        <p>{{ Str::words( strip_tags( $nueva->preparacion),15 , '...') }}</p>

                        <a href="{{ route('recetas.show', ['receta' => $nueva->id]) }}" class="btn btn-primary d-block font-weight-bold text-uppercase btn-receta">Ver Receta <i class="far fa-eye"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas màs Votadas</h2>    
   
        <div class="row">
            
                @foreach ($votadas as $receta )
                     @include('ui.receta') 
                @endforeach                  
            
        </div>
    </div>  

    @foreach ($recetas as $key => $grupo )
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{ str_replace('-',' ', $key) }}</h2>    
       
            <div class="row">
                @foreach ($grupo as $recetas )
                    @foreach ($recetas as $receta )
                         @include('ui.receta') 
                    @endforeach                  
                @endforeach
            </div>
        </div>        
    @endforeach

@endsection