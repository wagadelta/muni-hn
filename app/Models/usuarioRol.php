<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuarioRol extends Model
{
    
	public $table = "usuario_rols";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "id_usuario",
		"id_aplicacion",
		"id_rol"
	];

	public static $rules = [
	    "id_usuario" => "required",
		"id_aplicacion" => "required",
		"id_rol" => "required"
	];

}
