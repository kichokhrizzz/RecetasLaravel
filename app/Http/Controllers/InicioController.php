<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function index(){

        //Mostrar las recetas por cantidad de votos
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        //Obtener recetas màs nueva
        $nuevas = Receta::latest()->take(3)->get();

        //Obtener todas las categorias
        $categorias = CategoriaReceta::all();

        //Agrupar las recetas por categoria
        $recetas = [ ];
        foreach($categorias as $categoria)
        {
            $recetas[ Str::slug( $categoria->nombre) ] [ ] = Receta::where('categoria_id', $categoria->id)->get();
        }

        return view('inicio.index', compact('nuevas', 'recetas','votadas'));
    }
}
