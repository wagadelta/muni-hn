<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\tipoPersona;
use Illuminate\Http\Request;
use App\Libraries\Repositories\tipoPersonaRepository;
use Response;
use Schema;

class tipoPersonaAPIController extends AppBaseController
{

	/** @var  tipoPersonaRepository */
	private $tipoPersonaRepository;

	function __construct(tipoPersonaRepository $tipoPersonaRepo)
	{
		$this->tipoPersonaRepository = $tipoPersonaRepo;
	}

	/**
	 * Display a listing of the tipoPersona.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->tipoPersonaRepository->search($input);

		$tipoPersonas = $result[0];

		return Response::json(ResponseManager::makeResult($tipoPersonas->toArray(), "tipoPersonas retrieved successfully."));
	}

	public function search($input)
    {
        $query = tipoPersona::query();

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
	 * Show the form for creating a new tipoPersona.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created tipoPersona in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(tipoPersona::$rules) > 0)
            $this->validateRequest($request, tipoPersona::$rules);

        $input = $request->all();

		$tipoPersona = $this->tipoPersonaRepository->store($input);

		return Response::json(ResponseManager::makeResult($tipoPersona->toArray(), "tipoPersona saved successfully."));
	}

	/**
	 * Display the specified tipoPersona.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tipoPersona = $this->tipoPersonaRepository->findtipoPersonaById($id);

		if(empty($tipoPersona))
			$this->throwRecordNotFoundException("tipoPersona not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($tipoPersona->toArray(), "tipoPersona retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified tipoPersona.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified tipoPersona in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$tipoPersona = $this->tipoPersonaRepository->findtipoPersonaById($id);

		if(empty($tipoPersona))
			$this->throwRecordNotFoundException("tipoPersona not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$tipoPersona = $this->tipoPersonaRepository->update($tipoPersona, $input);

		return Response::json(ResponseManager::makeResult($tipoPersona->toArray(), "tipoPersona updated successfully."));
	}

	/**
	 * Remove the specified tipoPersona from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tipoPersona = $this->tipoPersonaRepository->findtipoPersonaById($id);

		if(empty($tipoPersona))
			$this->throwRecordNotFoundException("tipoPersona not found", ERROR_CODE_RECORD_NOT_FOUND);

		$tipoPersona->delete();

		return Response::json(ResponseManager::makeResult($id, "tipoPersona deleted successfully."));
	}
}
