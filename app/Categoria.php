<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //atributos correspondientes a la tabla
    protected $table = "category";
    protected $primaryKey = "category_id";
    public $timestamps = false;


//metodo que relasione la categoria con las peliculas 
public function peliculas()
{
    //la categoria se relacion con muchas peliculas
    //y la pelicula pertenece a muchas categorias
    return $this->belongsToMany('App\Pelicula','film_category','category_id','film_id');
}

}