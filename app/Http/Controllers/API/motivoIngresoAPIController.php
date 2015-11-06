<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\motivoIngreso;
use Illuminate\Http\Request;
use App\Libraries\Repositories\motivoIngresoRepository;
use Response;
use Schema;

class motivoIngresoAPIController extends AppBaseController
{

	/** @var  motivoIngresoRepository */
	private $motivoIngresoRepository;

	function __construct(motivoIngresoRepository $motivoIngresoRepo)
	{
		$this->motivoIngresoRepository = $motivoIngresoRepo;
	}

	/**
	 * Display a listing of the motivoIngreso.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->motivoIngresoRepository->search($input);

		$motivoIngresos = $result[0];

		return Response::json(ResponseManager::makeResult($motivoIngresos->toArray(), "motivoIngresos retrieved successfully."));
	}

	public function search($input)
    {
        $query = motivoIngreso::query();

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
	 * Show the form for creating a new motivoIngreso.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created motivoIngreso in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(motivoIngreso::$rules) > 0)
            $this->validateRequest($request, motivoIngreso::$rules);

        $input = $request->all();

		$motivoIngreso = $this->motivoIngresoRepository->store($input);

		return Response::json(ResponseManager::makeResult($motivoIngreso->toArray(), "motivoIngreso saved successfully."));
	}

	/**
	 * Display the specified motivoIngreso.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$motivoIngreso = $this->motivoIngresoRepository->findmotivoIngresoById($id);

		if(empty($motivoIngreso))
			$this->throwRecordNotFoundException("motivoIngreso not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($motivoIngreso->toArray(), "motivoIngreso retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified motivoIngreso.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified motivoIngreso in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$motivoIngreso = $this->motivoIngresoRepository->findmotivoIngresoById($id);

		if(empty($motivoIngreso))
			$this->throwRecordNotFoundException("motivoIngreso not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$motivoIngreso = $this->motivoIngresoRepository->update($motivoIngreso, $input);

		return Response::json(ResponseManager::makeResult($motivoIngreso->toArray(), "motivoIngreso updated successfully."));
	}

	/**
	 * Remove the specified motivoIngreso from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$motivoIngreso = $this->motivoIngresoRepository->findmotivoIngresoById($id);

		if(empty($motivoIngreso))
			$this->throwRecordNotFoundException("motivoIngreso not found", ERROR_CODE_RECORD_NOT_FOUND);

		$motivoIngreso->delete();

		return Response::json(ResponseManager::makeResult($id, "motivoIngreso deleted successfully."));
	}
}
