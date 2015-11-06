<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaFestivo extends Model
{
    
	public $table = "dia_festivos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "usuario_ingresa",
		"fecha_ingresa",
		"descripcion",
		"activo"
	];

	public static $rules = [
	    "usuario_ingresa" => "required",
		"fecha_ingresa" => "required",
		"descripcion" => "required",
		"activo" => "required"
	];

}
