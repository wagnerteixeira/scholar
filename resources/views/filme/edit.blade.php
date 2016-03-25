@extends('layouts.admin')
	@section('content')
		@include('alerts.request')
		  	{!!Form::model($movie, ['route'=>['filme.update', $movie->id], 'method'=>'PUT','files' => true])!!}
		  		@include('filme.forms.filme')
				{!!Form::submit('Atualizar',['class'=>'btn btn-primary'])!!}
			{!!Form::close()!!}

<!--			{!!Form::open(['route'=> ['filme.destroy', $movie->id], 'method'=>'DELETE'])!!}
				{!!Form::submit('Deletar',['class'=>'btn btn-danger'])!!}
			{!!Form::close()!!}-->
	@endsection