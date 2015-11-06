<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaFestivosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dia_festivos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('usuario_ingresa');
			$table->datetime('fecha_ingresa');
			$table->text('descripcion');
			$table->string('activo');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dia_festivos');
	}

}
