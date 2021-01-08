<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opiniones;
use App\Blog;
use App\Administradores;

use Illuminate\Support\Facades\DB;
use App\Articulos;

class OpinionesController extends Controller
{
    public function index(){

    	 $join = DB::table('opiniones')
         ->join('users','opiniones.id_adm','=','users.id')
         ->join('articulos', 'opiniones.id_art', '=', 'articulos.id_articulo')
         ->select('opiniones.*','users.*','articulos.*')->get();

        if(request()->ajax()){

            return datatables()->of($join)
            ->addColumn('aprobacion_opinion', function($data){

                if($data->aprobacion_opinion == 1){

                    $aprobacion = '<button class="btn btn-success btn-sm">Aprobado</button>';

                }else{

                    $aprobacion = '<button class="btn btn-danger btn-sm">Por Aprobar</button>';

                }

                return $aprobacion;

            })
            ->addColumn('acciones', function($data){

                $acciones = '<div class="btn-group">
                            <a href="'.url()->current().'/'.$data->id_opinion.'" class="btn btn-warning btn-sm">
                              <i class="fas fa-pencil-alt text-white"></i>
                            </a>

                            <button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id_opinion.'" method="DELETE" token="'.csrf_token().'" pagina="opiniones">
                            <i class="fas fa-trash-alt"></i>
                            </button>

                          </div>';

                return $acciones;

            })
            ->rawColumns(['aprobacion_opinion','acciones'])
            ->make(true);

        }

		$blog = Blog::all();
		$administradores = Administradores::all();

		return view("paginas.opiniones", array("blog"=>$blog, "administradores"=>$administradores));

	}

    /*=============================================
    Editar un registro
    =============================================*/

    public function update($id, Request $request){

        // Recoger los datos

        $datos = array("aprobacion_opinion"=>$request->input("aprobacion_opinion"),
            "respuesta_opinion"=>$request->input("respuesta_opinion")
            );

        // Recoger datos de la BD blog para las rutas de imágenes


        // Validar los datos

        if(!empty($datos)){

            $validar = \Validator::make($datos,[

                "aprobacion_opinion" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                "respuesta_opinion" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            ]);


            //Guardar Opinion

            if($validar->fails()){

                return redirect("opiniones")->with("no-validacion", "");

            }else{



                $datos = array(

                    "aprobacion_opinion" => $datos["aprobacion_opinion"],
                    "respuesta_opinion" => $datos["respuesta_opinion"]);

                $opinion = Opiniones::where('id_opinion', $id)->update($datos);

                return redirect("opiniones")->with("ok-editar", "");
            }

        }else{

            return redirect("opiniones")->with("error", "");

        }

    }


    /*=============================================
    Mostrar un solo registro
    =============================================*/

    public function show($id){

        $opiniones = Opiniones::where('id_opinion', $id)->get();
        $articulos = Articulos::all();
        $blog = Blog::all();
        $administradores = Administradores::all();

        if(count($opiniones) != 0){

            return view("paginas.opiniones", array("status"=>200, "opiniones"=>$opiniones,"articulo"=>$articulos, "blog"=>$blog, "administradores"=>$administradores));

        }else{

            return view("paginas.opiniones", array("status"=>404, "blog"=>$blog, "administradores"=>$administradores));

        }

    }

    /*=============================================
    Eliminar un registro
    =============================================*/

    public function destroy($id, Request $request){

        $validar = Opiniones::where("id_opinion", $id)->get();

        if(!empty($validar)){

            $articulo = Opiniones::where("id_opinion",$validar[0]["id_opinion"])->delete();

            //Responder al AJAX de JS
            return "ok";

        }else{

            return redirect("opiniones")->with("no-borrar", "");

        }

    }
}
