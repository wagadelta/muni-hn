<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\usuarioRol;
use Illuminate\Http\Request;
use App\Libraries\Repositories\usuarioRolRepository;
use Response;
use Schema;

class usuarioRolAPIController extends AppBaseController
{

	/** @var  usuarioRolRepository */
	private $usuarioRolRepository;

	function __construct(usuarioRolRepository $usuarioRolRepo)
	{
		$this->usuarioRolRepository = $usuarioRolRepo;
	}

	/**
	 * Display a listing of the usuarioRol.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->usuarioRolRepository->search($input);

		$usuarioRols = $result[0];

		return Response::json(ResponseManager::makeResult($usuarioRols->toArray(), "usuarioRols retrieved successfully."));
	}

	public function search($input)
    {
        $query = usuarioRol::query();

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
	 * Show the form for creating a new usuarioRol.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created usuarioRol in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(usuarioRol::$rules) > 0)
            $this->validateRequest($request, usuarioRol::$rules);

        $input = $request->all();

		$usuarioRol = $this->usuarioRolRepository->store($input);

		return Response::json(ResponseManager::makeResult($usuarioRol->toArray(), "usuarioRol saved successfully."));
	}

	/**
	 * Display the specified usuarioRol.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$usuarioRol = $this->usuarioRolRepository->findusuarioRolById($id);

		if(empty($usuarioRol))
			$this->throwRecordNotFoundException("usuarioRol not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($usuarioRol->toArray(), "usuarioRol retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified usuarioRol.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified usuarioRol in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$usuarioRol = $this->usuarioRolRepository->findusuarioRolById($id);

		if(empty($usuarioRol))
			$this->throwRecordNotFoundException("usuarioRol not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$usuarioRol = $this->usuarioRolRepository->update($usuarioRol, $input);

		return Response::json(ResponseManager::makeResult($usuarioRol->toArray(), "usuarioRol updated successfully."));
	}

	/**
	 * Remove the specified usuarioRol from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuarioRol = $this->usuarioRolRepository->findusuarioRolById($id);

		if(empty($usuarioRol))
			$this->throwRecordNotFoundException("usuarioRol not found", ERROR_CODE_RECORD_NOT_FOUND);

		$usuarioRol->delete();

		return Response::json(ResponseManager::makeResult($id, "usuarioRol deleted successfully."));
	}
}
