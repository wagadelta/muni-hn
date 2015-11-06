<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\tipoResolucion;
use Illuminate\Http\Request;
use App\Libraries\Repositories\tipoResolucionRepository;
use Response;
use Schema;

class tipoResolucionAPIController extends AppBaseController
{

	/** @var  tipoResolucionRepository */
	private $tipoResolucionRepository;

	function __construct(tipoResolucionRepository $tipoResolucionRepo)
	{
		$this->tipoResolucionRepository = $tipoResolucionRepo;
	}

	/**
	 * Display a listing of the tipoResolucion.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->tipoResolucionRepository->search($input);

		$tipoResolucions = $result[0];

		return Response::json(ResponseManager::makeResult($tipoResolucions->toArray(), "tipoResolucions retrieved successfully."));
	}

	public function search($input)
    {
        $query = tipoResolucion::query();

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
	 * Show the form for creating a new tipoResolucion.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created tipoResolucion in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(tipoResolucion::$rules) > 0)
            $this->validateRequest($request, tipoResolucion::$rules);

        $input = $request->all();

		$tipoResolucion = $this->tipoResolucionRepository->store($input);

		return Response::json(ResponseManager::makeResult($tipoResolucion->toArray(), "tipoResolucion saved successfully."));
	}

	/**
	 * Display the specified tipoResolucion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tipoResolucion = $this->tipoResolucionRepository->findtipoResolucionById($id);

		if(empty($tipoResolucion))
			$this->throwRecordNotFoundException("tipoResolucion not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($tipoResolucion->toArray(), "tipoResolucion retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified tipoResolucion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified tipoResolucion in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$tipoResolucion = $this->tipoResolucionRepository->findtipoResolucionById($id);

		if(empty($tipoResolucion))
			$this->throwRecordNotFoundException("tipoResolucion not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$tipoResolucion = $this->tipoResolucionRepository->update($tipoResolucion, $input);

		return Response::json(ResponseManager::makeResult($tipoResolucion->toArray(), "tipoResolucion updated successfully."));
	}

	/**
	 * Remove the specified tipoResolucion from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tipoResolucion = $this->tipoResolucionRepository->findtipoResolucionById($id);

		if(empty($tipoResolucion))
			$this->throwRecordNotFoundException("tipoResolucion not found", ERROR_CODE_RECORD_NOT_FOUND);

		$tipoResolucion->delete();

		return Response::json(ResponseManager::makeResult($id, "tipoResolucion deleted successfully."));
	}
}
