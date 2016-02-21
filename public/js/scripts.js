$(document).ready(function()
	{
		if($("#dados").length > 0){
			$.get("/listarGeneros", function(response)
			{
					$(response).each(function(key, value)
					{						
						$("#dados").append("<tr><td>" + value.genre + "</td><td><a href=\"genero/" + value.id + "/edit\" class=\"btn btn-primary\">Editar</a></td></tr>");
					});
			});
		}
	}

);

$("#cl").click(
	function()
	{
		$("#dados").append("<tr><td>" + "Teste" + "</td></tr>");
	}
)

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
				//$("#msg-success").fadeIn();
				if($("#msg-success").length == 0){
					$("#formData").prepend("<div id=\"msg-success\" class=\"alert alert-success alert-dismissible\" role=\"alert\"> " + 
  									"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" +
									"<strong>Genero criado com sucesso!</strong></div>");
				}
				else{
					$("#msg-success").fadeOut();
					$("#msg-success").fadeIn();
				}

				$("#genre").val("");
			}
		});
		
	}
);