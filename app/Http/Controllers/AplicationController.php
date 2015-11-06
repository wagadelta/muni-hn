<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAplicationRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\AplicationRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class AplicationController extends AppBaseController
{

	/** @var  AplicationRepository */
	private $aplicationRepository;

	function __construct(AplicationRepository $aplicationRepo)
	{
		$this->aplicationRepository = $aplicationRepo;
	}

	/**
	 * Display a listing of the Aplication.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->aplicationRepository->search($input);

		$aplications = $result[0];

		$attributes = $result[1];

		return view('aplications.index')
		    ->with('aplications', $aplications)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Aplication.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('aplications.create');
	}

	/**
	 * Store a newly created Aplication in storage.
	 *
	 * @param CreateAplicationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAplicationRequest $request)
	{
        $input = $request->all();

		$aplication = $this->aplicationRepository->store($input);

		Flash::message('Aplication saved successfully.');

		return redirect(route('aplications.index'));
	}

	/**
	 * Display the specified Aplication.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$aplication = $this->aplicationRepository->findAplicationById($id);

		if(empty($aplication))
		{
			Flash::error('Aplication not found');
			return redirect(route('aplications.index'));
		}

		return view('aplications.show')->with('aplication', $aplication);
	}

	/**
	 * Show the form for editing the specified Aplication.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$aplication = $this->aplicationRepository->findAplicationById($id);

		if(empty($aplication))
		{
			Flash::error('Aplication not found');
			return redirect(route('aplications.index'));
		}

		return view('aplications.edit')->with('aplication', $aplication);
	}

	/**
	 * Update the specified Aplication in storage.
	 *
	 * @param  int    $id
	 * @param CreateAplicationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateAplicationRequest $request)
	{
		$aplication = $this->aplicationRepository->findAplicationById($id);

		if(empty($aplication))
		{
			Flash::error('Aplication not found');
			return redirect(route('aplications.index'));
		}

		$aplication = $this->aplicationRepository->update($aplication, $request->all());

		Flash::message('Aplication updated successfully.');

		return redirect(route('aplications.index'));
	}

	/**
	 * Remove the specified Aplication from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$aplication = $this->aplicationRepository->findAplicationById($id);

		if(empty($aplication))
		{
			Flash::error('Aplication not found');
			return redirect(route('aplications.index'));
		}

		$aplication->delete();

		Flash::message('Aplication deleted successfully.');

		return redirect(route('aplications.index'));
	}

}
