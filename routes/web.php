<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Foreach_;
use App\Categoria;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("categorias","CategoriaController@index");//lista de categorias
Route::get("categorias/create","CategoriaController@create");//recibir datos para crear categoria
Route::post('categorias/store',"CategoriaController@store");//mandar datos de la categoria a la DB
Route::get('categorias/edit/{idcategoria}', "CategoriaController@edit");//recibir datos para actualziar categoria con un id especifico
Route::post('categorias/update',"CategoriaController@update");//mandar datos actualziados a la DB de la categoria seleccionada

//ruta de prueba
Route::get('prueba', function () {

    //arreglo de estudiantes
    $estudiantes = [
            "ana",
            "jorge",
            "Maria"
    ];
    //visualizar arreglo
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    
});

Route::get('paises', function () {
    $paises = [
        "colombia" => [
                "capital" => "Bogota",
                "moneda" => "peso",
                "poblacion" => 55,
                "ciudades" => [
                    "Cali","Medellin","Barranquilla"
                ]
        ] ,
        "ecuador" => [
            "capital" =>"Quito",
            "moneda" => "Dolar",
            "poblacion" => 10,
            "ciudades" => [
                "Guayaquil","Manta","Pichincha"
            ]
        ],
            "brazil" => [
            "capital" =>"Brazilia",
            "moneda" => "real",
            "poblacion" => 220,
            "ciudades" => [
                "Santos","Sao Paulo","Bahia"
            ]
            ]
        ];
        return view("paises")->with("paises",$paises);
}   );
/*//foreach para recorrer el arreglo de paises
foreach($paises as $pais => $infopais ) {
    echo "<h1> $pais </h1>";
         //recorrer la segunda dimencion del arreglo de paises "info de paises"
        foreach($infopais as $dato => $valor ){
            //al recorrer cada dato, si es que se trata de ciudades
             if($dato == "ciudades"){
                echo "<strong>Ciudades principales<strong>";
                echo "<lu>";
                foreach($valor as $ciudad ){
            echo "<li>$ciudad</li>"; 
        
        }echo "</lu>";
            }else{
        echo "<p>$dato:  $valor  </p>";
                }
        }
    echo "<hr >";

}*/
