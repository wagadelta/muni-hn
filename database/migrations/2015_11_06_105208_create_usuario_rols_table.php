<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateusuarioRolsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario_rols', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_usuario');
			$table->integer('id_aplicacion');
			$table->integer('id_rol');
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
		Schema::drop('usuario_rols');
	}

}
