{!!Form::open(array('id' => 'formData'))!!}
	@include('genero.forms.genero')
	{!!Form::token()!!}
	{!! Html::link('#', 'Registrar',  ['id' => 'registrarGenero','class' => 'btn btn-primary']) !!}
{!!Form::close()!!}