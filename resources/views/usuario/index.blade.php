@extends('layouts.admin')
@include('alerts.success')
@section('content')
	<table class="table">
		<thead>
			<th>Nome</th>
			<th>Email</th>
			@if(Auth::user()->admin)
			<th>Operação</th>
			@endif
		</thead>
		@foreach($users as $user)
		<tbody>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			@if(Auth::user()->admin)
			<td>
				{!! link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class' => 'btn btn-primary']) !!}
			</td>
			@endif
		</tbody>
		@endforeach
	</table>
	{!!$users->Render()!!}
@endsection	