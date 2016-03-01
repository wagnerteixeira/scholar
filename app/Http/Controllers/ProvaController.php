<?php 

namespace Cinema\Http\Controllers;
use Illuminate\Http\Request;
use Log;

class ProvaController extends Controller {

	public function __construct()
	{
		
	}

	/**
	 * Show the application Welcome
	 *
	 * @return Response
	 */
	public function index($num, Request $request)
	{
		Log::info("APP_DEBUG: ".env('APP_DEBUG'));
		if (env('APP_DEBUG') == true){
			$segments =$request->segments();
			Log::info("seg: ".serialize($request->segments()));
			Log::info("tam: ".sizeof($segments));
			Log::info('end: '.$segments[sizeof($segments) - 1]);
		}
		return "Prova Controller";
	}

	public function soma($num1, $nuum2){
		$soma = $soma + ($num1 + $nuum2);
		return "A soma é: ".$soma;
	}

	public function nome($nome)
	{
		return "no controlador nome é: ".$nome;
	}


}
