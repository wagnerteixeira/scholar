<?php namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\User;
use Illuminate\Routing\Route;

class UsuarioController extends Controller {

	public function __construct(){
		$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
	}

	public function find(Route $route){
		$this->user = User::find($route->getParameter('usuario'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::paginate(2);
		return view("usuario.index", compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuario.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserUpdateRequest $request)
	{
		User::create($request->all());
		Session::flash('message', 'Usuario incluido com sucesso!');
		return redirect('/usuario');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('usuario.edit', ['user'=>$this->user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UserUpdateRequest $request)
	{
		$this->user->fill($request->all());
		$this->user->save();
		Session::flash('message', 'Usuario alterado com sucesso!');
		return redirect('/usuario');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->delete();
		Session::flash('message', 'Usuario excluido com sucesso!');
		return redirect('/usuario');
	}

}
