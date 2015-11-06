<?php

namespace App\Libraries\Repositories;


use App\Models\opcionMenu;
use Illuminate\Support\Facades\Schema;

class opcionMenuRepository
{

	/**
	 * Returns all opcionMenus
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return opcionMenu::all();
	}

	public function search($input)
    {
        $query = opcionMenu::query();

        $columns = Schema::getColumnListing('opcion_menus');
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
	 * Stores opcionMenu into database
	 *
	 * @param array $input
	 *
	 * @return opcionMenu
	 */
	public function store($input)
	{
		return opcionMenu::create($input);
	}

	/**
	 * Find opcionMenu by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|opcionMenu
	 */
	public function findopcionMenuById($id)
	{
		return opcionMenu::find($id);
	}

	/**
	 * Updates opcionMenu into database
	 *
	 * @param opcionMenu $opcionMenu
	 * @param array $input
	 *
	 * @return opcionMenu
	 */
	public function update($opcionMenu, $input)
	{
		$opcionMenu->fill($input);
		$opcionMenu->save();

		return $opcionMenu;
	}
}