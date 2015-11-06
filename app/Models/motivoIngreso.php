<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class motivoIngreso extends Model
{
    
	public $table = "motivo_ingresos";

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
