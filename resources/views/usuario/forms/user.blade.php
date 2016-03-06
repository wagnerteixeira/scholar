		<div class="form-group">
			{!! Form::label('Nome') !!}
			{!! Form::text('name', null, [ 'id' => 'name', 'class'=>'form-control', 'placeholder'=>'Entre com o nome do usuário']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Email') !!}
			{!! Form::text('email', null, ['id' => 'email', 'class'=>'form-control', 'placeholder'=>'Entre com o Email']) !!}
		</div>
		<div class="form-group">
			{!! Form::checkbox('admin') !!}
			{!! Form::Label('Administrador') !!}
		</div>
		<div class="form-group">
			{!! Form::label('Senha') !!}
			{!! Form::password('password', ['id' => 'password', 'class'=>'form-control', 'placeholder'=>'Entre com a Senha']) !!}
		</div>
