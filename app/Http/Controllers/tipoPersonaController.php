<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatetipoPersonaRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\tipoPersonaRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class tipoPersonaController extends AppBaseController
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

		$attributes = $result[1];

		return view('tipoPersonas.index')
		    ->with('tipoPersonas', $tipoPersonas)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new tipoPersona.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipoPersonas.create');
	}

	/**
	 * Store a newly created tipoPersona in storage.
	 *
	 * @param CreatetipoPersonaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatetipoPersonaRequest $request)
	{
        $input = $request->all();

		$tipoPersona = $this->tipoPersonaRepository->store($input);

		Flash::message('tipoPersona saved successfully.');

		return redirect(route('tipoPersonas.index'));
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
		{
			Flash::error('tipoPersona not found');
			return redirect(route('tipoPersonas.index'));
		}

		return view('tipoPersonas.show')->with('tipoPersona', $tipoPersona);
	}

	/**
	 * Show the form for editing the specified tipoPersona.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipoPersona = $this->tipoPersonaRepository->findtipoPersonaById($id);

		if(empty($tipoPersona))
		{
			Flash::error('tipoPersona not found');
			return redirect(route('tipoPersonas.index'));
		}

		return view('tipoPersonas.edit')->with('tipoPersona', $tipoPersona);
	}

	/**
	 * Update the specified tipoPersona in storage.
	 *
	 * @param  int    $id
	 * @param CreatetipoPersonaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatetipoPersonaRequest $request)
	{
		$tipoPersona = $this->tipoPersonaRepository->findtipoPersonaById($id);

		if(empty($tipoPersona))
		{
			Flash::error('tipoPersona not found');
			return redirect(route('tipoPersonas.index'));
		}

		$tipoPersona = $this->tipoPersonaRepository->update($tipoPersona, $request->all());

		Flash::message('tipoPersona updated successfully.');

		return redirect(route('tipoPersonas.index'));
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
		{
			Flash::error('tipoPersona not found');
			return redirect(route('tipoPersonas.index'));
		}

		$tipoPersona->delete();

		Flash::message('tipoPersona deleted successfully.');

		return redirect(route('tipoPersonas.index'));
	}

}
