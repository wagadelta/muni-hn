<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemotivoLlamadaRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\motivoLlamadaRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class motivoLlamadaController extends AppBaseController
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

		$attributes = $result[1];

		return view('motivoLlamadas.index')
		    ->with('motivoLlamadas', $motivoLlamadas)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new motivoLlamada.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('motivoLlamadas.create');
	}

	/**
	 * Store a newly created motivoLlamada in storage.
	 *
	 * @param CreatemotivoLlamadaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatemotivoLlamadaRequest $request)
	{
        $input = $request->all();

		$motivoLlamada = $this->motivoLlamadaRepository->store($input);

		Flash::message('motivoLlamada saved successfully.');

		return redirect(route('motivoLlamadas.index'));
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
		{
			Flash::error('motivoLlamada not found');
			return redirect(route('motivoLlamadas.index'));
		}

		return view('motivoLlamadas.show')->with('motivoLlamada', $motivoLlamada);
	}

	/**
	 * Show the form for editing the specified motivoLlamada.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$motivoLlamada = $this->motivoLlamadaRepository->findmotivoLlamadaById($id);

		if(empty($motivoLlamada))
		{
			Flash::error('motivoLlamada not found');
			return redirect(route('motivoLlamadas.index'));
		}

		return view('motivoLlamadas.edit')->with('motivoLlamada', $motivoLlamada);
	}

	/**
	 * Update the specified motivoLlamada in storage.
	 *
	 * @param  int    $id
	 * @param CreatemotivoLlamadaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatemotivoLlamadaRequest $request)
	{
		$motivoLlamada = $this->motivoLlamadaRepository->findmotivoLlamadaById($id);

		if(empty($motivoLlamada))
		{
			Flash::error('motivoLlamada not found');
			return redirect(route('motivoLlamadas.index'));
		}

		$motivoLlamada = $this->motivoLlamadaRepository->update($motivoLlamada, $request->all());

		Flash::message('motivoLlamada updated successfully.');

		return redirect(route('motivoLlamadas.index'));
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
		{
			Flash::error('motivoLlamada not found');
			return redirect(route('motivoLlamadas.index'));
		}

		$motivoLlamada->delete();

		Flash::message('motivoLlamada deleted successfully.');

		return redirect(route('motivoLlamadas.index'));
	}

}
