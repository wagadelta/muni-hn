<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class motivoLlamada extends Model
{
    
	public $table = "motivo_llamadas";

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
