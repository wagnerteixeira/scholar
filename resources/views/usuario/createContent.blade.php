<div id="divUsuario">
@include('usuario.forms.user')
{!!Form::token()!!}
{!! Html::link('#', 'Registrar',  ['id' => 'registrarUsuario','class' => 'btn btn-primary']) !!}
</div>
