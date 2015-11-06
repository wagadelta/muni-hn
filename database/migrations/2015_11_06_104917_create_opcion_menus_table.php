<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateopcionMenusTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opcion_menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_aplicacion');
			$table->integer('id_aplicacion_padre');
			$table->integer('id_opcion_menu');
			$table->integer('id_opcion_menu_padre');
			$table->string('nombre');
			$table->string('direccion');
			$table->integer('orden');
			$table->string('imagen');
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
		Schema::drop('opcion_menus');
	}

}
