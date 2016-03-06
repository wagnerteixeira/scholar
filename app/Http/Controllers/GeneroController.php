<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Log;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Genre;
use Illuminate\Routing\Route;
use Cinema\Http\Requests\GeneroRequest;

class GeneroController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['create', 'edit']]); 
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    
    public function find(Route $route){
        if (env("APP_DEBUG"))
            log::info("params: ".serialize($route->parameters()));

        $this->genero = Genre::find($route->getParameter('genero'));
        if (env("APP_DEBUG"))
            log::info("generoObject: ".$this->genero);
    }

    /**
     * return a listing of Genero.
     *
     * @return Json data of list a Genero
     */
    public function listar()
    {
        return response()->json(
            Genre::all()->toArray()
        );        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $generos = Genre::paginate(7);
        if ($request->ajax())
            return response()->json(view('genero.generosContent', compact('generos'))->render());
        else
            return view("genero.index", compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax())   
            return response()->json(view('genero.createContent')->render());
        else
            return view('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroRequest $request)
    {
        if($request->ajax()){
            Genre::create($request->all());
            return response()->json([
                "message" => "OK"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(
            $this->genero->toArray()
        );   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeneroRequest $request, $id)
    {
        if(env('APP_DEBUG'))
            log::info("genero antes: ".$this->genero);
        $this->genero->fill($request->all());
        $this->genero->save();
        if(env('APP_DEBUG'))
            log::info("genero depois: ".$this->genero);
        return response()->json(
            ["message"=>"OK"]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->genero->delete();
        return response()->json(
            ["message"=>"OK"]
        );
    }
}
