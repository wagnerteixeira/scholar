<div class="form-group">
	{!!Form::label('name','Nome:')!!}
	{!!Form::text('name',null,['id'=> 'name', 'class'=>'form-control', 'placeholder'=>'Entre com o nome do filme'])!!}
</div>
<div class="form-group">
	{!!Form::label('cast','Elenco:')!!}
	{!!Form::text('cast',null,['id'=> 'cast','class'=>'form-control', 'placeholder'=>'Entre com o elenco'])!!}
</div>
<div class="form-group">
	{!!Form::label('diretor','Diretor:')!!}
	{!!Form::text('direction',null,['id'=> 'diretor','class'=>'form-control', 'placeholder'=>'Entre com o diretor'])!!}
</div>
<div class="form-group">
	{!!Form::label('duracao','Duração:')!!}
	{!!Form::text('duration',null,['id'=> 'duracao','class'=>'form-control', 'placeholder'=>'Entre com a duração'])!!}
</div>
<div class="form-group">
	{!!Form::label('path','Arquivo:')!!}
	{!!Form::file('path')!!}
</div>
<div class="form-group">
	{!!Form::label('genero','Genero:')!!}
	<br/>
	{!!Form::select('genre_id',$genres)!!}
</div>