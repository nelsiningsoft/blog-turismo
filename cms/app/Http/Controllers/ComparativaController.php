<?php

namespace App\Http\Controllers;

use App\Articulos;
use App\Categorias;
use Illuminate\Http\Request;
use App\Anuncios;
use App\Blog;
use App\Administradores;

class ComparativaController extends Controller
{
    public function index(){
        $blog = Blog::all();
        $administradores = Administradores::all();
        $categorias = Categorias::all();
        $articulos = Articulos::all();
        return view("paginas.comparativa", array("blog"=>$blog, "administradores"=>$administradores,"categorias"=>$categorias,"articulos"=>$articulos));
    }
}
