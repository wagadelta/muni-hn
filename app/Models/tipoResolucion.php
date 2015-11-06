<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoResolucion extends Model
{
    
	public $table = "tipo_resolucions";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"activo"
	];

	public static $rules = [
	    "nombre" => "required"
	];

}
