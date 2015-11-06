<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class opcionMenu extends Model
{
    
	public $table = "opcion_menus";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "id_aplicacion",
		"id_aplicacion_padre",
		"id_opcion_menu",
		"id_opcion_menu_padre",
		"nombre",
		"direccion",
		"orden",
		"imagen",
		"activo"
	];

	public static $rules = [
	    "id_aplicacion" => "required",
		"id_aplicacion_padre" => "required",
		"id_opcion_menu" => "required",
		"id_opcion_menu_padre" => "required",
		"nombre" => "required",
		"direccion" => "required"
	];

}
