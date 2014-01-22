<?php

class UtilisateursController extends BaseController {

	/**
	 * Utilisateur Repository
	 *
	 * @var Utilisateur
	 */
	protected $Utilisateur;

	public function __construct(Utilisateur $Utilisateur)
	{
		$this->Utilisateur = $Utilisateur;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Utilisateurs = $this->Utilisateur->all();

		return View::make('Utilisateurs.index', compact('Utilisateurs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Utilisateurs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Utilisateur::$rules);

		if ($validation->passes())
		{
			$this->Utilisateur->create($input);

			return Redirect::route('Utilisateurs.index');
		}

		return Redirect::route('Utilisateurs.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Utilisateur = $this->Utilisateur->findOrFail($id);

		return View::make('Utilisateurs.show', compact('Utilisateur'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Utilisateur = $this->Utilisateur->find($id);

		if (is_null($Utilisateur))
		{
			return Redirect::route('Utilisateurs.index');
		}

		return View::make('Utilisateurs.edit', compact('Utilisateur'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Utilisateur::$rules);

		if ($validation->passes())
		{
			$Utilisateur = $this->Utilisateur->find($id);
			$Utilisateur->update($input);

			return Redirect::route('Utilisateurs.show', $id);
		}

		return Redirect::route('Utilisateurs.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->Utilisateur->find($id)->delete();

		return Redirect::route('Utilisateurs.index');
	}

}
