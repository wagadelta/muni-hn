<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatetipoResolucionRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\tipoResolucionRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class tipoResolucionController extends AppBaseController
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

		$attributes = $result[1];

		return view('tipoResolucions.index')
		    ->with('tipoResolucions', $tipoResolucions)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new tipoResolucion.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipoResolucions.create');
	}

	/**
	 * Store a newly created tipoResolucion in storage.
	 *
	 * @param CreatetipoResolucionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatetipoResolucionRequest $request)
	{
        $input = $request->all();

		$tipoResolucion = $this->tipoResolucionRepository->store($input);

		Flash::message('tipoResolucion saved successfully.');

		return redirect(route('tipoResolucions.index'));
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
		{
			Flash::error('tipoResolucion not found');
			return redirect(route('tipoResolucions.index'));
		}

		return view('tipoResolucions.show')->with('tipoResolucion', $tipoResolucion);
	}

	/**
	 * Show the form for editing the specified tipoResolucion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipoResolucion = $this->tipoResolucionRepository->findtipoResolucionById($id);

		if(empty($tipoResolucion))
		{
			Flash::error('tipoResolucion not found');
			return redirect(route('tipoResolucions.index'));
		}

		return view('tipoResolucions.edit')->with('tipoResolucion', $tipoResolucion);
	}

	/**
	 * Update the specified tipoResolucion in storage.
	 *
	 * @param  int    $id
	 * @param CreatetipoResolucionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatetipoResolucionRequest $request)
	{
		$tipoResolucion = $this->tipoResolucionRepository->findtipoResolucionById($id);

		if(empty($tipoResolucion))
		{
			Flash::error('tipoResolucion not found');
			return redirect(route('tipoResolucions.index'));
		}

		$tipoResolucion = $this->tipoResolucionRepository->update($tipoResolucion, $request->all());

		Flash::message('tipoResolucion updated successfully.');

		return redirect(route('tipoResolucions.index'));
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
		{
			Flash::error('tipoResolucion not found');
			return redirect(route('tipoResolucions.index'));
		}

		$tipoResolucion->delete();

		Flash::message('tipoResolucion deleted successfully.');

		return redirect(route('tipoResolucions.index'));
	}

}
