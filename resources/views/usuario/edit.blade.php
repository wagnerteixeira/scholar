@extends('layouts.admin')
@section('content')
@include('alerts.request')
			{!! Form::model($user, ['route'=> ['usuario.update', $user->id], 'method'=>'PUT']) !!}
			@include('usuario.forms.user')
		<div class="row">
		<div class="col-sm-2">
				{!!	Form::submit('Atualizar', ['class' => 'btn btn-primary' ]) !!}		
				{!!	Form::close() !!}
		</div>	
		<div class="col-sm-2">
			{!! Form::open(['route'=> ['usuario.destroy', $user->id], 'method'=>'DELETE']) !!}
			{!!	Form::submit('Excluir', ['class' => 'btn btn-danger' ]) !!}	
			{!!	Form::close() !!}
		</div>
	</div>
@endsection	