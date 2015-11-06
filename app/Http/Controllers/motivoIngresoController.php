<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemotivoIngresoRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\motivoIngresoRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class motivoIngresoController extends AppBaseController
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

		$attributes = $result[1];

		return view('motivoIngresos.index')
		    ->with('motivoIngresos', $motivoIngresos)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new motivoIngreso.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('motivoIngresos.create');
	}

	/**
	 * Store a newly created motivoIngreso in storage.
	 *
	 * @param CreatemotivoIngresoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatemotivoIngresoRequest $request)
	{
        $input = $request->all();

		$motivoIngreso = $this->motivoIngresoRepository->store($input);

		Flash::message('motivoIngreso saved successfully.');

		return redirect(route('motivoIngresos.index'));
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
		{
			Flash::error('motivoIngreso not found');
			return redirect(route('motivoIngresos.index'));
		}

		return view('motivoIngresos.show')->with('motivoIngreso', $motivoIngreso);
	}

	/**
	 * Show the form for editing the specified motivoIngreso.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$motivoIngreso = $this->motivoIngresoRepository->findmotivoIngresoById($id);

		if(empty($motivoIngreso))
		{
			Flash::error('motivoIngreso not found');
			return redirect(route('motivoIngresos.index'));
		}

		return view('motivoIngresos.edit')->with('motivoIngreso', $motivoIngreso);
	}

	/**
	 * Update the specified motivoIngreso in storage.
	 *
	 * @param  int    $id
	 * @param CreatemotivoIngresoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatemotivoIngresoRequest $request)
	{
		$motivoIngreso = $this->motivoIngresoRepository->findmotivoIngresoById($id);

		if(empty($motivoIngreso))
		{
			Flash::error('motivoIngreso not found');
			return redirect(route('motivoIngresos.index'));
		}

		$motivoIngreso = $this->motivoIngresoRepository->update($motivoIngreso, $request->all());

		Flash::message('motivoIngreso updated successfully.');

		return redirect(route('motivoIngresos.index'));
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
		{
			Flash::error('motivoIngreso not found');
			return redirect(route('motivoIngresos.index'));
		}

		$motivoIngreso->delete();

		Flash::message('motivoIngreso deleted successfully.');

		return redirect(route('motivoIngresos.index'));
	}

}
