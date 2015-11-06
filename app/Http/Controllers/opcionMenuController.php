<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateopcionMenuRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\opcionMenuRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class opcionMenuController extends AppBaseController
{

	/** @var  opcionMenuRepository */
	private $opcionMenuRepository;

	function __construct(opcionMenuRepository $opcionMenuRepo)
	{
		$this->opcionMenuRepository = $opcionMenuRepo;
	}

	/**
	 * Display a listing of the opcionMenu.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->opcionMenuRepository->search($input);

		$opcionMenus = $result[0];

		$attributes = $result[1];

		return view('opcionMenus.index')
		    ->with('opcionMenus', $opcionMenus)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new opcionMenu.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('opcionMenus.create');
	}

	/**
	 * Store a newly created opcionMenu in storage.
	 *
	 * @param CreateopcionMenuRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateopcionMenuRequest $request)
	{
        $input = $request->all();

		$opcionMenu = $this->opcionMenuRepository->store($input);

		Flash::message('opcionMenu saved successfully.');

		return redirect(route('opcionMenus.index'));
	}

	/**
	 * Display the specified opcionMenu.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$opcionMenu = $this->opcionMenuRepository->findopcionMenuById($id);

		if(empty($opcionMenu))
		{
			Flash::error('opcionMenu not found');
			return redirect(route('opcionMenus.index'));
		}

		return view('opcionMenus.show')->with('opcionMenu', $opcionMenu);
	}

	/**
	 * Show the form for editing the specified opcionMenu.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$opcionMenu = $this->opcionMenuRepository->findopcionMenuById($id);

		if(empty($opcionMenu))
		{
			Flash::error('opcionMenu not found');
			return redirect(route('opcionMenus.index'));
		}

		return view('opcionMenus.edit')->with('opcionMenu', $opcionMenu);
	}

	/**
	 * Update the specified opcionMenu in storage.
	 *
	 * @param  int    $id
	 * @param CreateopcionMenuRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateopcionMenuRequest $request)
	{
		$opcionMenu = $this->opcionMenuRepository->findopcionMenuById($id);

		if(empty($opcionMenu))
		{
			Flash::error('opcionMenu not found');
			return redirect(route('opcionMenus.index'));
		}

		$opcionMenu = $this->opcionMenuRepository->update($opcionMenu, $request->all());

		Flash::message('opcionMenu updated successfully.');

		return redirect(route('opcionMenus.index'));
	}

	/**
	 * Remove the specified opcionMenu from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$opcionMenu = $this->opcionMenuRepository->findopcionMenuById($id);

		if(empty($opcionMenu))
		{
			Flash::error('opcionMenu not found');
			return redirect(route('opcionMenus.index'));
		}

		$opcionMenu->delete();

		Flash::message('opcionMenu deleted successfully.');

		return redirect(route('opcionMenus.index'));
	}

}
