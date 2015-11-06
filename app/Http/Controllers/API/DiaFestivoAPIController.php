<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\DiaFestivo;
use Illuminate\Http\Request;
use App\Libraries\Repositories\DiaFestivoRepository;
use Response;
use Schema;

class DiaFestivoAPIController extends AppBaseController
{

	/** @var  DiaFestivoRepository */
	private $diaFestivoRepository;

	function __construct(DiaFestivoRepository $diaFestivoRepo)
	{
		$this->diaFestivoRepository = $diaFestivoRepo;
	}

	/**
	 * Display a listing of the DiaFestivo.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->diaFestivoRepository->search($input);

		$diaFestivos = $result[0];

		return Response::json(ResponseManager::makeResult($diaFestivos->toArray(), "DiaFestivos retrieved successfully."));
	}

	public function search($input)
    {
        $query = DiaFestivo::query();

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
	 * Show the form for creating a new DiaFestivo.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created DiaFestivo in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(DiaFestivo::$rules) > 0)
            $this->validateRequest($request, DiaFestivo::$rules);

        $input = $request->all();

		$diaFestivo = $this->diaFestivoRepository->store($input);

		return Response::json(ResponseManager::makeResult($diaFestivo->toArray(), "DiaFestivo saved successfully."));
	}

	/**
	 * Display the specified DiaFestivo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$diaFestivo = $this->diaFestivoRepository->findDiaFestivoById($id);

		if(empty($diaFestivo))
			$this->throwRecordNotFoundException("DiaFestivo not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($diaFestivo->toArray(), "DiaFestivo retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified DiaFestivo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified DiaFestivo in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$diaFestivo = $this->diaFestivoRepository->findDiaFestivoById($id);

		if(empty($diaFestivo))
			$this->throwRecordNotFoundException("DiaFestivo not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$diaFestivo = $this->diaFestivoRepository->update($diaFestivo, $input);

		return Response::json(ResponseManager::makeResult($diaFestivo->toArray(), "DiaFestivo updated successfully."));
	}

	/**
	 * Remove the specified DiaFestivo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$diaFestivo = $this->diaFestivoRepository->findDiaFestivoById($id);

		if(empty($diaFestivo))
			$this->throwRecordNotFoundException("DiaFestivo not found", ERROR_CODE_RECORD_NOT_FOUND);

		$diaFestivo->delete();

		return Response::json(ResponseManager::makeResult($id, "DiaFestivo deleted successfully."));
	}
}
