<?php

namespace App\Libraries\Repositories;


use App\Models\tipoPersona;
use Illuminate\Support\Facades\Schema;

class tipoPersonaRepository
{

	/**
	 * Returns all tipoPersonas
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return tipoPersona::all();
	}

	public function search($input)
    {
        $query = tipoPersona::query();

        $columns = Schema::getColumnListing('tipo_personas');
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
	 * Stores tipoPersona into database
	 *
	 * @param array $input
	 *
	 * @return tipoPersona
	 */
	public function store($input)
	{
		return tipoPersona::create($input);
	}

	/**
	 * Find tipoPersona by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|tipoPersona
	 */
	public function findtipoPersonaById($id)
	{
		return tipoPersona::find($id);
	}

	/**
	 * Updates tipoPersona into database
	 *
	 * @param tipoPersona $tipoPersona
	 * @param array $input
	 *
	 * @return tipoPersona
	 */
	public function update($tipoPersona, $input)
	{
		$tipoPersona->fill($input);
		$tipoPersona->save();

		return $tipoPersona;
	}
}