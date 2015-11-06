<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDiaFestivoRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\DiaFestivoRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class DiaFestivoController extends AppBaseController
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

		$attributes = $result[1];

		return view('diaFestivos.index')
		    ->with('diaFestivos', $diaFestivos)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new DiaFestivo.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('diaFestivos.create');
	}

	/**
	 * Store a newly created DiaFestivo in storage.
	 *
	 * @param CreateDiaFestivoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDiaFestivoRequest $request)
	{
        $input = $request->all();

		$diaFestivo = $this->diaFestivoRepository->store($input);

		Flash::message('DiaFestivo saved successfully.');

		return redirect(route('diaFestivos.index'));
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
		{
			Flash::error('DiaFestivo not found');
			return redirect(route('diaFestivos.index'));
		}

		return view('diaFestivos.show')->with('diaFestivo', $diaFestivo);
	}

	/**
	 * Show the form for editing the specified DiaFestivo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$diaFestivo = $this->diaFestivoRepository->findDiaFestivoById($id);

		if(empty($diaFestivo))
		{
			Flash::error('DiaFestivo not found');
			return redirect(route('diaFestivos.index'));
		}

		return view('diaFestivos.edit')->with('diaFestivo', $diaFestivo);
	}

	/**
	 * Update the specified DiaFestivo in storage.
	 *
	 * @param  int    $id
	 * @param CreateDiaFestivoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateDiaFestivoRequest $request)
	{
		$diaFestivo = $this->diaFestivoRepository->findDiaFestivoById($id);

		if(empty($diaFestivo))
		{
			Flash::error('DiaFestivo not found');
			return redirect(route('diaFestivos.index'));
		}

		$diaFestivo = $this->diaFestivoRepository->update($diaFestivo, $request->all());

		Flash::message('DiaFestivo updated successfully.');

		return redirect(route('diaFestivos.index'));
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
		{
			Flash::error('DiaFestivo not found');
			return redirect(route('diaFestivos.index'));
		}

		$diaFestivo->delete();

		Flash::message('DiaFestivo deleted successfully.');

		return redirect(route('diaFestivos.index'));
	}

}
