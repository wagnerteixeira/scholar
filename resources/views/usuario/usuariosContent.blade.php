<div id="divUsuarios">
@include('usuario.modal')	
<table class="table">
	<thead>
		<th>Nome</th>
		<th>Email</th>
		@if(Auth::user()->admin)
		<th>Operação</th>
		@endif
	</thead>
	<tbody>
	@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			@if(Auth::user()->admin)
			<td>
				{!! Html::link('#', 'Editar',  ['id' => $user->id ,'class' => 'btn btn-primary',  'OnClick'=> 'MostrarUsuario(this);',  'data-toggle'=>'modal', 'data-target'=> '#myModal']) !!}
				<!--<button id={!! $user->id !!} value= {!! $user !!} class='btn btn-primary' OnClick='MostrarUsuario(this);' 'data-toggle'='modal' 'data-target'='#myModal'>EditarButton</button>-->

				{!! Html::link('#', 'Exluir',  ['id' => $user->id, 'class' => 'btn btn-danger', 'valor'=> $user, 'value'=> $user->id, 'OnClick'=> 'ExcluirUsuario(this);']) !!}
			</td>
			@endif
		</tr>
	@endforeach
	</tbody>
</table>
{!!$users->Render()!!}
</div>