<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\motivoLlamada;
use Illuminate\Http\Request;
use App\Libraries\Repositories\motivoLlamadaRepository;
use Response;
use Schema;

class motivoLlamadaAPIController extends AppBaseController
{

	/** @var  motivoLlamadaRepository */
	private $motivoLlamadaRepository;

	function __construct(motivoLlamadaRepository $motivoLlamadaRepo)
	{
		$this->motivoLlamadaRepository = $motivoLlamadaRepo;
	}

	/**
	 * Display a listing of the motivoLlamada.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->motivoLlamadaRepository->search($input);

		$motivoLlamadas = $result[0];

		return Response::json(ResponseManager::makeResult($motivoLlamadas->toArray(), "motivoLlamadas retrieved successfully."));
	}

	public function search($input)
    {
        $query = motivoLlamada::query();

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
	 * Show the form for creating a new motivoLlamada.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created motivoLlamada in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(motivoLlamada::$rules) > 0)
            $this->validateRequest($request, motivoLlamada::$rules);

        $input = $request->all();

		$motivoLlamada = $this->motivoLlamadaRepository->store($input);

		return Response::json(ResponseManager::makeResult($motivoLlamada->toArray(), "motivoLlamada saved successfully."));
	}

	/**
	 * Display the specified motivoLlamada.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$motivoLlamada = $this->motivoLlamadaRepository->findmotivoLlamadaById($id);

		if(empty($motivoLlamada))
			$this->throwRecordNotFoundException("motivoLlamada not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($motivoLlamada->toArray(), "motivoLlamada retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified motivoLlamada.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified motivoLlamada in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$motivoLlamada = $this->motivoLlamadaRepository->findmotivoLlamadaById($id);

		if(empty($motivoLlamada))
			$this->throwRecordNotFoundException("motivoLlamada not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$motivoLlamada = $this->motivoLlamadaRepository->update($motivoLlamada, $input);

		return Response::json(ResponseManager::makeResult($motivoLlamada->toArray(), "motivoLlamada updated successfully."));
	}

	/**
	 * Remove the specified motivoLlamada from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$motivoLlamada = $this->motivoLlamadaRepository->findmotivoLlamadaById($id);

		if(empty($motivoLlamada))
			$this->throwRecordNotFoundException("motivoLlamada not found", ERROR_CODE_RECORD_NOT_FOUND);

		$motivoLlamada->delete();

		return Response::json(ResponseManager::makeResult($id, "motivoLlamada deleted successfully."));
	}
}
