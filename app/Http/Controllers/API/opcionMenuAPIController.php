<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\opcionMenu;
use Illuminate\Http\Request;
use App\Libraries\Repositories\opcionMenuRepository;
use Response;
use Schema;

class opcionMenuAPIController extends AppBaseController
{

	/** @var  opcionMenuRepository */
	private $opcionMenuRepository;

	function __construct(opcionMenuRepository $opcionMenuRepo)
	{
		$this->opcionMenuRepository = $opcionMenuRepo;
	}

	/**
	 * Display a listing of the opcionMenu.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->opcionMenuRepository->search($input);

		$opcionMenus = $result[0];

		return Response::json(ResponseManager::makeResult($opcionMenus->toArray(), "opcionMenus retrieved successfully."));
	}

	public function search($input)
    {
        $query = opcionMenu::query();

        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute)
        {
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
            }
        }

        return $query->get();
    }

	/**
	 * Show the form for creating a new opcionMenu.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created opcionMenu in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(opcionMenu::$rules) > 0)
            $this->validateRequest($request, opcionMenu::$rules);

        $input = $request->all();

		$opcionMenu = $this->opcionMenuRepository->store($input);

		return Response::json(ResponseManager::makeResult($opcionMenu->toArray(), "opcionMenu saved successfully."));
	}

	/**
	 * Display the specified opcionMenu.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$opcionMenu = $this->opcionMenuRepository->findopcionMenuById($id);

		if(empty($opcionMenu))
			$this->throwRecordNotFoundException("opcionMenu not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($opcionMenu->toArray(), "opcionMenu retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified opcionMenu.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified opcionMenu in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$opcionMenu = $this->opcionMenuRepository->findopcionMenuById($id);

		if(empty($opcionMenu))
			$this->throwRecordNotFoundException("opcionMenu not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$opcionMenu = $this->opcionMenuRepository->update($opcionMenu, $input);

		return Response::json(ResponseManager::makeResult($opcionMenu->toArray(), "opcionMenu updated successfully."));
	}

	/**
	 * Remove the specified opcionMenu from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$opcionMenu = $this->opcionMenuRepository->findopcionMenuById($id);

		if(empty($opcionMenu))
			$this->throwRecordNotFoundException("opcionMenu not found", ERROR_CODE_RECORD_NOT_FOUND);

		$opcionMenu->delete();

		return Response::json(ResponseManager::makeResult($id, "opcionMenu deleted successfully."));
	}
}
