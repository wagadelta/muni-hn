<?php

namespace App\Libraries\Repositories;


use App\Models\Aplication;
use Illuminate\Support\Facades\Schema;

class AplicationRepository
{

	/**
	 * Returns all Aplications
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Aplication::all();
	}

	public function search($input)
    {
        $query = Aplication::query();

        $columns = Schema::getColumnListing('aplications');
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
	 * Stores Aplication into database
	 *
	 * @param array $input
	 *
	 * @return Aplication
	 */
	public function store($input)
	{
		return Aplication::create($input);
	}

	/**
	 * Find Aplication by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Aplication
	 */
	public function findAplicationById($id)
	{
		return Aplication::find($id);
	}

	/**
	 * Updates Aplication into database
	 *
	 * @param Aplication $aplication
	 * @param array $input
	 *
	 * @return Aplication
	 */
	public function update($aplication, $input)
	{
		$aplication->fill($input);
		$aplication->save();

		return $aplication;
	}
}