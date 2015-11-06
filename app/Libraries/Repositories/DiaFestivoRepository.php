<?php

namespace App\Libraries\Repositories;


use App\Models\DiaFestivo;
use Illuminate\Support\Facades\Schema;

class DiaFestivoRepository
{

	/**
	 * Returns all DiaFestivos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return DiaFestivo::all();
	}

	public function search($input)
    {
        $query = DiaFestivo::query();

        $columns = Schema::getColumnListing('dia_festivos');
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
	 * Stores DiaFestivo into database
	 *
	 * @param array $input
	 *
	 * @return DiaFestivo
	 */
	public function store($input)
	{
		return DiaFestivo::create($input);
	}

	/**
	 * Find DiaFestivo by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|DiaFestivo
	 */
	public function findDiaFestivoById($id)
	{
		return DiaFestivo::find($id);
	}

	/**
	 * Updates DiaFestivo into database
	 *
	 * @param DiaFestivo $diaFestivo
	 * @param array $input
	 *
	 * @return DiaFestivo
	 */
	public function update($diaFestivo, $input)
	{
		$diaFestivo->fill($input);
		$diaFestivo->save();

		return $diaFestivo;
	}
}