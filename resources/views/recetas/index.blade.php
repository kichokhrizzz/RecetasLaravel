@extends('layouts.app')

@section('botones')

    <a href="{{ route('recetas.create') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">Crear Receta</a>
    <a href="{{ route('perfiles.edit', ['perfil' => Auth::user()->id]) }}" class="btn btn-outline-success mr-2 text-uppercase font-weight-bold">Editar Perfil</a>
    <a href="{{ route('perfiles.show', ['perfil' => Auth::user()->id]) }}" class="btn btn-outline-info mr-2 text-uppercase font-weight-bold">Ver Perfil</a>
    
@endsection

@section('content')

    <h2 class="text-center mb-5">Administra tus recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recetas as  $receta)
                    <tr>
                        <th scope="col">{{ $receta->titulo }}</th>
                        <th scope="col">{{ $receta->categoria -> nombre }}</th>
                        <td>
                            <eliminar-receta receta-id={{ $receta->id }}></eliminar-receta>
                            <a href="{{ route('recetas.edit', ['receta' => $receta->id])}}" class="btn btn-dark d-block w-100 mb-2">Editar</a>
                            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-success d-block w-100 mb-2">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $recetas->links() }}
        </div>

    </div>

@endsection