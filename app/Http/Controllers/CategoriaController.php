<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    //los controladores se componen de acciones
    //acciones = metodos
    //pueden tener el nombre deseado tratar de no usar mayusculas
    public function index(){    
        $categorias = Categoria::paginate(5);
        return view("categorias.index")->with("categorias",$categorias);
    
    }   


    public function create(){
        return view("categorias.new");
    }

    public function store(){
        //validar datos
        //reglas de validacion para los campos del formulario
        $reglas =[
            "categoria" => ["required" , "alpha" , "min:4" , "unique:category,name"]

        ];
        $mensajes = [
            "required"=>"Campo requerido",
            "alpha" => "Solo Letras",
            "unique"=>"Categoria repetida"

        ];
        $validador = validator::make($_POST, $reglas, $mensajes);

        if($validador->fails()){

            return redirect('categorias/create')->withErrors($validador)->withInput();

        }else{
            $categoria = new Categoria;
            $categoria->name=$_POST["categoria"];
            $categoria->save();
            
            return redirect('categorias/create')->with("Exito","Categoria registrada") ;
        }


       
    }
    public function edit($idcategoria){  
        $categoria = Categoria::find($idcategoria);
        return view('categorias.editar')->with("categoria", $categoria);
    }   

    public function update($categoria){
                //validar datos
        //reglas de validacion para los campos del formulario
        $reglas =[
            "categoria" => ["required" , "alpha" , "min:4" , "unique:category,name"]

        ];
        $mensajes = [
            "required"=>"Campo requerido",
            "alpha" => "Solo Letras",
            "unique"=>"Categoria repetida",
            "min" => "Solo categorias de :min caracteres"

        ];
        $validador = validator::make($_POST, $reglas, $mensajes);
        if($validador->fails()){

            return redirect('categorias/edit/'.$categoria->category_id)->withErrors($validador)->withInput();

        }else{

       //seleccionar categoria a editar
       $categoria = Categoria::find($_POST["id"]);
       //actualizar atraibuto
       $categoria->name=$_POST["categoriaActualizada"];
       $categoria->save();
       echo "cambios guardados";
        }
    }



}
