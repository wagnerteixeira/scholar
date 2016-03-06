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
use Log;

class UsuarioController extends Controller {

	public function __construct(){
		$this->middleware('auth');
		$this->middleware('admin', ['only' => ['create', 'edit']]);	
		$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
	}

	public function find(Route $route){
		if (env("APP_DEBUG"))
            log::info("params: ".serialize($route->parameters()));
		$this->user = User::find($route->getParameter('usuario'));
		if (env("APP_DEBUG"))
            log::info("generoObject: ".$this->user);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$users = User::paginate(2);
		if ($request->ajax())
            return response()->json(view('usuario.usuariosContent', compact('users'))->render());
        else
			return view("usuario.index", compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if ($request->ajax())   
            return response()->json(view('usuario.createContent')->render());
        else
			return view('usuario.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserUpdateRequest $request)
	{
		//User::create($request->all());
		//Session::flash('message', 'Usuario incluido com sucesso!');
		//return redirect('/usuario');

		if($request->ajax()){
            User::create($request->all());
            return response()->json([
                "message" => "OK"
            ]);
        }
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
		//return view('usuario.edit', ['user'=>$this->user]);
		return response()->json(
            $this->user->toArray()
        );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UserUpdateRequest $request)
	{
		if(env('APP_DEBUG'))
            log::info("usuario antes: ".$this->user);
		$this->user->fill($request->all());
		$this->user->save();
		//Session::flash('message', 'Usuario alterado com sucesso!');
		if(env('APP_DEBUG'))
            log::info("usuario depois: ".$this->user);
		//return redirect('/usuario');
        return response()->json(
            ["message"=>"OK"]
        );
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
        return response()->json(
            ["message"=>"OK"]
        );
		//Session::flash('message', 'Usuario excluido com sucesso!');
		//return redirect('/usuario');
	}

}
