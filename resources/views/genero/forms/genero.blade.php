<div class="form-group">
	{!!Form::label('genre', 'Nome')!!}	
	{!!Form::text('genre', null, ['id'=>'genre', 'class'=>'form-control', 'placeholder'=>'Digite o nome'])!!}	
</div>
<div class="form-group">
	{!!Form::label('categoria', 'Categoria')!!}	
	{!!Form::text('categoria', null, ['id'=>'categoria', 'class'=>'form-control', 'placeholder'=>'Digite a categoria'])!!}	
</div>
<div class="form-group">
	{!! Form::checkbox('active') !!}
	{!! Form::Label('Ativo?') !!}
</div>