<?php namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Cinema\Movie;
use Cinema\Genre;
use Illuminate\Routing\Route;
use Session;
use Redirect;
//use Carbon\Carbon;
use Log;

class MovieController extends Controller {


	public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['create', 'edit']]); 
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }

    public function find(Route $route){
        if (env("APP_DEBUG"))
            log::info("params: ".serialize($route->parameters()));

        $this->movie = Movie::find($route->getParameter('filme'));
        if (env("APP_DEBUG"))
            log::info("movieObject: ".$this->movie);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$movies = Movie::Movies();
		return view('filme.index', compact('movies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$genres =  ['0' => ''] + Genre::lists('genre', 'id')->toArray();
		log::info($genres);
		return view('filme.create', compact('genres'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		Movie::create($request->all());
		Session::flash('message', 'Filme criado com sucesso!');
		return Redirect::to('/filme');
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
		$genres = Genre::lists('genre', 'id');
		return view('filme.edit', ['movie' => $this->movie, 'genres'=> $genres]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$this->movie->fill($request->all());
		$this->movie->save();
		Session::flash('message', 'Filme atualizado com sucesso!');
		return Redirect::to('/filme');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\Storage::delete($this->movie->path);
		$this->movie->delete();
		Session::flash('message', 'Filme excluido com sucesso!');
		return Redirect::to('/filme');
	}

}
