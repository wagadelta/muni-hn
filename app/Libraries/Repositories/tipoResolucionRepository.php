<?php

namespace App\Libraries\Repositories;


use App\Models\tipoResolucion;
use Illuminate\Support\Facades\Schema;

class tipoResolucionRepository
{

	/**
	 * Returns all tipoResolucions
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return tipoResolucion::all();
	}

	public function search($input)
    {
        $query = tipoResolucion::query();

        $columns = Schema::getColumnListing('tipo_resolucions');
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
	 * Stores tipoResolucion into database
	 *
	 * @param array $input
	 *
	 * @return tipoResolucion
	 */
	public function store($input)
	{
		return tipoResolucion::create($input);
	}

	/**
	 * Find tipoResolucion by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|tipoResolucion
	 */
	public function findtipoResolucionById($id)
	{
		return tipoResolucion::find($id);
	}

	/**
	 * Updates tipoResolucion into database
	 *
	 * @param tipoResolucion $tipoResolucion
	 * @param array $input
	 *
	 * @return tipoResolucion
	 */
	public function update($tipoResolucion, $input)
	{
		$tipoResolucion->fill($input);
		$tipoResolucion->save();

		return $tipoResolucion;
	}
}