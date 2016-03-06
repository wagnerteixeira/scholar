<div id="divGenero">
@include('genero.modal')	
<table class="table">
	<thead>
		<th>Nome</th>
		<th>Ativo</th>
		<th>Categoria</th>
		@if(Auth::user()->admin)
			<th>Operação</th>
		@endif		
	</thead> 		
	<tbody>
		@foreach($generos as $genero)
			<tr>
				<td>{{$genero->genre}}</td>
				<td>{{$genero->active ? 'Ativo' : 'Inativo'}}</td>
				<td>{{$genero->categoria}}</td>
				@if(Auth::user()->admin)
				<td>
					{!! Html::link('#', 'Editar',  ['id' => $genero->id ,'class' => 'btn btn-primary', 'value'=> $genero->genre, 'OnClick'=> 'MostrarGenero(this);',  'data-toggle'=>'modal', 'data-target'=> '#myModal']) !!}
					<!--<button id={!! $genero->id !!} value= {!! $genero->genre !!} class='btn btn-primary' OnClick='Mostrar(this);' 'data-toggle'='modal' 'data-target'='#myModal'>EditarButton</button>-->

					{!! Html::link('#', 'Exluir',  ['id' => $genero->id, 'class' => 'btn btn-danger', 'valor'=> $genero->genre, 'value'=> $genero->id, 'OnClick'=> 'ExcluirGenero(this);']) !!}
				</td>
			</tr>
			@endif
		@endforeach
	</tbody>
</table>
{!!$generos->Render()!!}
</div>