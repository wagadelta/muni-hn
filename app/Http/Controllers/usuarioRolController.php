<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateusuarioRolRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\usuarioRolRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class usuarioRolController extends AppBaseController
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

		$attributes = $result[1];

		return view('usuarioRols.index')
		    ->with('usuarioRols', $usuarioRols)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new usuarioRol.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuarioRols.create');
	}

	/**
	 * Store a newly created usuarioRol in storage.
	 *
	 * @param CreateusuarioRolRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateusuarioRolRequest $request)
	{
        $input = $request->all();

		$usuarioRol = $this->usuarioRolRepository->store($input);

		Flash::message('usuarioRol saved successfully.');

		return redirect(route('usuarioRols.index'));
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
		{
			Flash::error('usuarioRol not found');
			return redirect(route('usuarioRols.index'));
		}

		return view('usuarioRols.show')->with('usuarioRol', $usuarioRol);
	}

	/**
	 * Show the form for editing the specified usuarioRol.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuarioRol = $this->usuarioRolRepository->findusuarioRolById($id);

		if(empty($usuarioRol))
		{
			Flash::error('usuarioRol not found');
			return redirect(route('usuarioRols.index'));
		}

		return view('usuarioRols.edit')->with('usuarioRol', $usuarioRol);
	}

	/**
	 * Update the specified usuarioRol in storage.
	 *
	 * @param  int    $id
	 * @param CreateusuarioRolRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateusuarioRolRequest $request)
	{
		$usuarioRol = $this->usuarioRolRepository->findusuarioRolById($id);

		if(empty($usuarioRol))
		{
			Flash::error('usuarioRol not found');
			return redirect(route('usuarioRols.index'));
		}

		$usuarioRol = $this->usuarioRolRepository->update($usuarioRol, $request->all());

		Flash::message('usuarioRol updated successfully.');

		return redirect(route('usuarioRols.index'));
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
		{
			Flash::error('usuarioRol not found');
			return redirect(route('usuarioRols.index'));
		}

		$usuarioRol->delete();

		Flash::message('usuarioRol deleted successfully.');

		return redirect(route('usuarioRols.index'));
	}

}
