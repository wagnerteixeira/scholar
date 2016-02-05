<?php namespace Cinema\Http\Controllers;

class ProvaController extends Controller {

	public function __construct()
	{
		$this->$soma = 0;
	}

	/**
	 * Show the application Welcome
	 *
	 * @return Response
	 */
	public function index()
	{
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
