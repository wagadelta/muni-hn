<?php

namespace App\Libraries\Repositories;


use App\Models\motivoLlamada;
use Illuminate\Support\Facades\Schema;

class motivoLlamadaRepository
{

	/**
	 * Returns all motivoLlamadas
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return motivoLlamada::all();
	}

	public function search($input)
    {
        $query = motivoLlamada::query();

        $columns = Schema::getColumnListing('motivo_llamadas');
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
	 * Stores motivoLlamada into database
	 *
	 * @param array $input
	 *
	 * @return motivoLlamada
	 */
	public function store($input)
	{
		return motivoLlamada::create($input);
	}

	/**
	 * Find motivoLlamada by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|motivoLlamada
	 */
	public function findmotivoLlamadaById($id)
	{
		return motivoLlamada::find($id);
	}

	/**
	 * Updates motivoLlamada into database
	 *
	 * @param motivoLlamada $motivoLlamada
	 * @param array $input
	 *
	 * @return motivoLlamada
	 */
	public function update($motivoLlamada, $input)
	{
		$motivoLlamada->fill($input);
		$motivoLlamada->save();

		return $motivoLlamada;
	}
}