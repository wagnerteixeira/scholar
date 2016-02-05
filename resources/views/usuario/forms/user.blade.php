		<div class="form-group">
			{!! Form::label('Nome') !!}
			{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Entre com o nome do usuário']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Email') !!}
			{!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Entre com o Email']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Senha') !!}
			{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Entre com a Senha']) !!}
		</div>
