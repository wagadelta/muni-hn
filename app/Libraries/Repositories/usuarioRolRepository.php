<?php

namespace App\Libraries\Repositories;


use App\Models\usuarioRol;
use Illuminate\Support\Facades\Schema;

class usuarioRolRepository
{

	/**
	 * Returns all usuarioRols
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return usuarioRol::all();
	}

	public function search($input)
    {
        $query = usuarioRol::query();

        $columns = Schema::getColumnListing('usuario_rols');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores usuarioRol into database
	 *
	 * @param array $input
	 *
	 * @return usuarioRol
	 */
	public function store($input)
	{
		return usuarioRol::create($input);
	}

	/**
	 * Find usuarioRol by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|usuarioRol
	 */
	public function findusuarioRolById($id)
	{
		return usuarioRol::find($id);
	}

	/**
	 * Updates usuarioRol into database
	 *
	 * @param usuarioRol $usuarioRol
	 * @param array $input
	 *
	 * @return usuarioRol
	 */
	public function update($usuarioRol, $input)
	{
		$usuarioRol->fill($input);
		$usuarioRol->save();

		return $usuarioRol;
	}
}