	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Atualizar Genero</h4>
      </div>
      <div class="modal-body">      
        {!!Form::token()!!}
      	<input type="hidden" id="idGenero">
        @include('genero.forms.genero')
      </div>
      <div class="modal-footer">
        {!! Html::link('#', 'Atualizar',  ['id' => 'atualizar','class' => 'btn btn-primary']) !!}
      </div>
    </div>
  </div>
</div>