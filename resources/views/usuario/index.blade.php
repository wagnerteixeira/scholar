@extends('layouts.admin')
@include('alerts.success')
@section('content')
	<table class="table">
		<thead>
			<th>Nome</th>
			<th>Email</th>
			<th>Operação</th>
		</thead>
		@foreach($users as $user)
		<tbody>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>
				{!! link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class' => 'btn btn-primary']) !!}
			</td>
		</tbody>
		@endforeach
	</table>
	{!!$users->Render()!!}
@endsection	