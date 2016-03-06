<div id="divGenero">
	@include('genero.forms.genero')
	{!!Form::token()!!}
	{!! Html::link('#', 'Registrar',  ['id' => 'registrarGenero','class' => 'btn btn-primary']) !!}
</div>