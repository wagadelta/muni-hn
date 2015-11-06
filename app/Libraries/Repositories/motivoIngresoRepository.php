<?php

namespace App\Libraries\Repositories;


use App\Models\motivoIngreso;
use Illuminate\Support\Facades\Schema;

class motivoIngresoRepository
{

	/**
	 * Returns all motivoIngresos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return motivoIngreso::all();
	}

	public function search($input)
    {
        $query = motivoIngreso::query();

        $columns = Schema::getColumnListing('motivo_ingresos');
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
	 * Stores motivoIngreso into database
	 *
	 * @param array $input
	 *
	 * @return motivoIngreso
	 */
	public function store($input)
	{
		return motivoIngreso::create($input);
	}

	/**
	 * Find motivoIngreso by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|motivoIngreso
	 */
	public function findmotivoIngresoById($id)
	{
		return motivoIngreso::find($id);
	}

	/**
	 * Updates motivoIngreso into database
	 *
	 * @param motivoIngreso $motivoIngreso
	 * @param array $input
	 *
	 * @return motivoIngreso
	 */
	public function update($motivoIngreso, $input)
	{
		$motivoIngreso->fill($input);
		$motivoIngreso->save();

		return $motivoIngreso;
	}
}