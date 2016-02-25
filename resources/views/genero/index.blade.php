@extends('layouts.admin')
	@section('content')
	@include('genero.modal')
		<table class="table">
			<thead>
				<th id="cl">Nome</th>
				<th>Operação</th>
			</thead> 		
			<tbody id="dados">
			
			</tbody>
		</table>
	@endsection
	@section('scripts')
	{!! Html::script('js/scripts.js') !!}
	@endsection