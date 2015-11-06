<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoPersona extends Model
{
    
	public $table = "tipo_personas";

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
