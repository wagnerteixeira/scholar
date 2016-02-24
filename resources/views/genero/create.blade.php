@extends('layouts.admin')
@section('content')
{!!Form::open(array('id' => 'formData'))!!}
	<!--@include('alerts.ajaxsuccess')-->
	@include('genero.forms.genero')
	{!!Form::token()!!}
	{!! Html::link('#', 'Registrar',  ['id' => 'registro','class' => 'btn btn-primary']) !!}
{!!Form::close()!!}
@endsection
@section('scripts')
	{!! Html::script('js/scripts.js') !!}
@endsection