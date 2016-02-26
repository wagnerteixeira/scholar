@include('genero.modal')	
<table class="table">
	<thead>
		<th>Nome</th>
		@if(Auth::user()->admin)
			<th>Operação</th>
		@endif		
	</thead> 		
	<tbody>
		@foreach($generos as $genero)
			<tr>
				<td>{{$genero->genre}}</td>
				@if(Auth::user()->admin)
				<td>
					{!! Html::link('#', 'Editar',  ['id' => $genero->id ,'class' => 'btn btn-primary', 'value'=> $genero->genre, 'OnClick'=> 'Mostrar(this);',  'data-toggle'=>'modal', 'data-target'=> '#myModal']) !!}
					<!--<button id={!! $genero->id !!} value= {!! $genero->genre !!} class='btn btn-primary' OnClick='Mostrar(this);' 'data-toggle'='modal' 'data-target'='#myModal'>EditarButton</button>-->

					{!! Html::link('#', 'Exluir',  ['id' => $genero->id, 'class' => 'btn btn-danger', 'valor'=> $genero->genre, 'value'=> $genero->id, 'OnClick'=> 'Excluir(this);']) !!}
				</td>
			</tr>
			@endif
		@endforeach
	</tbody>
</table>
{!!$generos->Render()!!}