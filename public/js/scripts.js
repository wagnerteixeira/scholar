$(document).ready(function()
	{
		if($("#dados").length > 0){
			carregargeneros();	
		}
	}
);

function montaCabecalhoGeneros(){
	$("#page-wrapper").empty();
	$("#page-wrapper").append("<table class='table'> "+
								"<thead>" +
									"<th>Nome</th>" +
									"<th>Operação</th>" +
								"</thead>" +
								"<tbody id='dados'>" +			
								"</tbody>" +
							   "</table>");
}

function carregargeneros(){
	$("#dados").empty();
	$.get("/listarGeneros", function(response)
	{
			$(response).each(function(key, value)
			{						
				$("#dados").append("<tr><td id='td" + value.id + "''>" + value.genre + "</td>" +
				"<td><button valor="+ value.genre + " value=" + value.id + " class='btn btn-primary' OnClick='Mostrar(this);' data-toggle='modal' data-target='#myModal'>Editar</button></td></tr>");
			});
	});
}

function Mostrar(btn){
	$("#genre").val($("#td" + btn.value).text());
	$("#idGenero").val(btn.value);
}

$("#atualizar").click(
	function()
	{
		var value = $("#idGenero").val();
		var dado = $("#genre").val();
		console.log(dado);
		var route = "/genero/" + value +"";
		var token = $("input[name='_token']").val();
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'PUT',
			dataType: 'json',
			data:{genre: dado},
			success:function(){
				//$("#msg-success").fadeIn();
				if($("#msg-success").length == 0){
					$("#page-wrapper").prepend("<div id=\"msg-success\" class=\"alert alert-success alert-dismissible\" role=\"alert\"> " + 
  									"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" +
									"<strong>Genero atualizado com sucesso!</strong></div>");
				}
				else{
					$("#msg-success").fadeOut();
					$("#msg-success").fadeIn();
				}
				$("#myModal").modal('toggle');
				carregargeneros();
			}
		});
	}
);

$("#registro").click(
	function()
	{		
		var dado = $("#genre").val();
		var route = "/genero";
		var token = $("input[name='_token']").val();
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data:{genre: dado},
			success:function(){
				montaCabecalhoGeneros();
				carregargeneros();
				if($("#msg-success").length == 0){
					$("#page-wrapper").prepend("<div id=\"msg-success\" class=\"alert alert-success alert-dismissible\" role=\"alert\"> " + 
  									"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" +
									"<strong>Genero criado com sucesso!</strong></div>");
				}
				else{
					$("#msg-success").fadeOut();
					$("#msg-success").fadeIn();
				}

			}
		});
		
	}
);