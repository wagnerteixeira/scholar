@if(Session::has('message-error'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Opa! </strong>Houve algum problema.<br><br>
   &nbsp&nbsp     {{Session::get('message-error')}}
</div>
@endif