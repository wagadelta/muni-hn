<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
    
	public $table = "aplications";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"activo"
	];

	public static $rules = [
	    "nombre" => "required",
		"activo" => "required"
	];

}
