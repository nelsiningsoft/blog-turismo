<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncios;
use App\Blog;
use App\Administradores;

class RecuperacionController extends Controller
{
    public function index(){

        return view("paginas.recuperacion");

    }
}
