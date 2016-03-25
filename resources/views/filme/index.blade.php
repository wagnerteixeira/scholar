@extends('layouts.admin')	
	@section('content')
		@include('alerts.success')
		<table class="table">
			<thead>
				<th>Nome</th>
				<th>Genero</th>
				<th>Diretor</th>
				<th>Capa</th>
				<th>Operações</th>
			</thead>
			<tbody>
				@foreach($movies as $movie)
				<tr>
					<td>{{$movie->name}}</td>
					<td>{{$movie->genre}}</td>
					<td>{{$movie->direction}}</td>
					<td>
						<img src="movies/{{$movie->path}}" alt="" style="width:100px;">
					</td>
					<td>{!!link_to_route('filme.edit', $title = 'Editar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary'])!!}
					{!!Form::open(['route'=> ['filme.destroy', $movie->id], 'method'=>'DELETE'])!!}
				{!!Form::submit('Deletar',['class'=>'btn btn-danger'])!!}
			{!!Form::close()!!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endsection