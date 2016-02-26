$(document).ready(function()
	{
		setAtualizarClick();
		setRegistrarClick();
	}
);
//carrega os generos a partir do click no menu
$("#generos").click(
	carregarGeneros
);
//função para carregar os generos.
function carregarGeneros($page, $sync){
	var $route = "/genero";
	if ($.isNumeric($page) && $page > 1)
		$route = $route + "?page=" + $page;	
	$("body").css("cursor", "progress");
	if($sync){
		$.ajax({
    		async: false,
    		type: 'GET',
    		url: $route,
    		dataType: 'json',
    		success: function(data) {
    			console.log(data.length);
        		$("#page-content").empty();
				$("#page-content").html($(data));
				if ($("tbody").html().trim().length == 0){
					carregarGeneros($page - 1, true);
					return;
				}
				setAtualizarClick(); 
				$("body").css("cursor", "default");
     		}
		});
	}
	else{
		$.get($route, function(response)
		{
			$("#page-content").empty();
			$("#page-content").html($(response));
			setAtualizarClick();
			$("body").css("cursor", "default");
		});
	}

}
//carrega o html para criação de um genero
$("#criarGenero").click(function(){		
		var token = $("input[name='_token']").val();
		//alert(token);
		$.get("/genero/create", function(response)
		{
			$("#page-content").empty();
			$("#page-content").html($(response));
			setRegistrarClick();
		});
	}
);
//recarrega os generos de acordo com a paginação
$(document).on('click', '.pagination a', function(e){
		e.preventDefault();
		var split = $(this).attr('href').split("/");
		var route = "/" + split[split.length -1];
		$.get(route, function(response)
		{
			$("#page-content").empty();
			$("#page-content").html($(response));
			setAtualizarClick();
		});
	}
);

function Excluir(btn)
{
	
	var route = "/genero/" + btn.id;
	var token = $("input[name='_token']").val();
	var page = $("li.active > span").text();
	$("body").css("cursor", "progress");
	$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'DELETE',
			dataType: 'json',
			success:function(){
				carregarGeneros(page, true);
				if($("#msg-success").length == 0){
					$("#page-content").prepend("<div id=\"msg-success\" class=\"alert alert-success alert-dismissible\" role=\"alert\"> " + 
  									"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" +
									"<strong id='text-success'>Genero excluído com sucesso!</strong></div>");
					console.log("add msg-sucess");
				}
				else{
					$("#msg-success").fadeOut();
					$("#text-success").text("Genero excluído com sucesso!");
					$("#msg-success").fadeIn();
					console.log("editou msg-sucess");
				}
			}
		});
}

function Mostrar(btn){
	if($("#msg-error").length > 0){
		$("#msg-error").remove();
	}
	
	console.log(btn.id);
	console.log($(btn).attr('value'));
	$("#genre").val($(btn).attr('value'));
	$("#idGenero").val(btn.id);
}

function setAtualizarClick(){
	$("#atualizar").click(
		function()
		{
			var value = $("#idGenero").val();
			var dado = $("#genre").val();
			var page = $("li.active > span").text();
			console.log(dado);
			var route = "/genero/" + value +"";
			var token = $("input[name='_token']").val();
			$("body").css("cursor", "progress");
			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'PUT',
				dataType: 'json',
				data:{genre: dado},
				success:function(){
					carregarGeneros(page, true);					
					if($("#msg-success").length == 0){
						$("#page-content").prepend("<div id=\"msg-success\" class=\"alert alert-success alert-dismissible\" role=\"alert\"> " + 
	  									"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" +
										"<strong id='text-success'>Genero atualizado com sucesso!</strong></div>");
					}
					else{
						$("#msg-success").fadeOut();
						$("#text-success").text("Genero atualizado com sucesso!");
						$("#msg-success").fadeIn();
					}					
				},
				error:function(msg){
					var divError = "<div id='msg-error' class='alert alert-danger alert-dismissible' role='alert'> " +
									   "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> " +
									   "<strong>Opa! </strong>Houve algum problema.<br><br> " +   
								   "<ul> ";
					var errors = msg.responseJSON.genre;
					$(errors).each(function(key, value){
									divError = divError + "<li>" + value + "</li>";
								  }				
					);
					
					divError = divError +"</ul></div>";			
					if($("#msg-error").length > 0){
						$("#msg-error").remove();
					}

					$(".modal-body").prepend(divError);
					$("body").css("cursor", "default");
				},
			});
		}
	);
}
function setRegistrarClick(){
	$("#registrar").click(
		function()
		{		
			var dado = $("#genre").val();
			var route = "/genero";
			var token = $("input[name='_token']").val();
			console.log(token);
			console.log(dado);
			$("body").css("cursor", "progress");
			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'POST',
				dataType: 'json',
				data:{genre: dado},
				success:function(){
					console.log("sucesso!");
					if($("#msg-error").length > 0){
						$("#msg-error").remove();
					}
					if($("#msg-success").length == 0){
						$("#page-content").prepend("<div id=\"msg-success\" class=\"alert alert-success alert-dismissible\" role=\"alert\"> " + 
	  									"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" +
										"<strong id='text-success'>Genero criado com sucesso!</strong></div>");
					}
					else{
						$("#msg-success").fadeOut();
						$("#text-success").text("Genero criado com sucesso!");
						$("#msg-success").fadeIn();
					}
					$("#genre").val("");
					$("body").css("cursor", "default");
					//carregarGeneros();

				},
				error:function(msg){
					var divError = "<div id='msg-error' class='alert alert-danger alert-dismissible' role='alert'> " +
									   "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> " +
									   "<strong>Opa! </strong>Houve algum problema.<br><br> " +   
								   "<ul> ";
					var errors = msg.responseJSON.genre;
					$(errors).each(function(key, value){
									divError = divError + "<li>" + value + "</li>";
								}				
					);
					
					divError = divError +"</ul></div>";			
					if($("#msg-error").length > 0){
						$("#msg-error").remove();
					}

					$("#page-content").prepend(divError);
					$("body").css("cursor", "default");
				},
			});
			
		}
	);
}