<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Aplication;
use Illuminate\Http\Request;
use App\Libraries\Repositories\AplicationRepository;
use Response;
use Schema;

class AplicationAPIController extends AppBaseController
{

	/** @var  AplicationRepository */
	private $aplicationRepository;

	function __construct(AplicationRepository $aplicationRepo)
	{
		$this->aplicationRepository = $aplicationRepo;
	}

	/**
	 * Display a listing of the Aplication.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->aplicationRepository->search($input);

		$aplications = $result[0];

		return Response::json(ResponseManager::makeResult($aplications->toArray(), "Aplications retrieved successfully."));
	}

	public function search($input)
    {
        $query = Aplication::query();

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
	 * Show the form for creating a new Aplication.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Aplication in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Aplication::$rules) > 0)
            $this->validateRequest($request, Aplication::$rules);

        $input = $request->all();

		$aplication = $this->aplicationRepository->store($input);

		return Response::json(ResponseManager::makeResult($aplication->toArray(), "Aplication saved successfully."));
	}

	/**
	 * Display the specified Aplication.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$aplication = $this->aplicationRepository->findAplicationById($id);

		if(empty($aplication))
			$this->throwRecordNotFoundException("Aplication not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($aplication->toArray(), "Aplication retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Aplication.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Aplication in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$aplication = $this->aplicationRepository->findAplicationById($id);

		if(empty($aplication))
			$this->throwRecordNotFoundException("Aplication not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$aplication = $this->aplicationRepository->update($aplication, $input);

		return Response::json(ResponseManager::makeResult($aplication->toArray(), "Aplication updated successfully."));
	}

	/**
	 * Remove the specified Aplication from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$aplication = $this->aplicationRepository->findAplicationById($id);

		if(empty($aplication))
			$this->throwRecordNotFoundException("Aplication not found", ERROR_CODE_RECORD_NOT_FOUND);

		$aplication->delete();

		return Response::json(ResponseManager::makeResult($id, "Aplication deleted successfully."));
	}
}
