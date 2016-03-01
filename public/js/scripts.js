	$(document).ready(function()
	{
		setAtualizarGeneroClick();
		setRegistrarGeneroClick();
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
	//$("body").css("cursor", "progress");
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
				setAtualizarGeneroClick(); 
				//$("body").css("cursor", "default");
     		}
		});
	}
	else{
		$.get($route, function(response)
		{
			$("#page-content").empty();
			$("#page-content").html($(response));
			setAtualizarGeneroClick();
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
			setRegistrarGeneroClick();
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
			setAtualizarGeneroClick();
		});
	}
);

function ExcluirGenero(btn)
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

function MostrarGenero(btn){
	if($("#msg-error").length > 0){
		$("#msg-error").remove();
	}
	
	console.log(btn.id);
	var route = "/genero/" + btn.id + "/edit";
	$.get(route, function(response)
	{
		console.log(response);
		$("#idGenero").val(btn.id);
		$("#genre").val(response.genre);
		$("#categoria").val(response.categoria);
		if(response.active == 1)
			$('input[name=active]').prop('checked', true);
		else
			$('input[name=active]').prop('checked', false);
	});	
	
}

function setAtualizarGeneroClick(){
	$("#atualizarGenero").click(
		function()
		{
			var value = $("#idGenero").val();
			var dado = getGeneroFromModal();
			var page = $("li.active > span").text();
			console.log(dado);
			var route = "/genero/" + value +"";
			var token = $("input[name='_token']").val();
			//$("body").css("cursor", "progress");
			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'PUT',
				dataType: 'json',
				data:dado,
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
				error: processaErroGenero,
			});
		}
	);
}

function processaErroGenero(msg){
	var divError = "<div id='msg-error' class='alert alert-danger alert-dismissible' role='alert'> " +
					   "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> " +
					   "<strong>Opa! </strong>Houve algum problema.<br><br> " +   
				   "<ul> ";
	var $errors = [];
	console.log(msg.responseJSON);
	console.log("genre: "+ msg.responseJSON.hasOwnProperty('genre'));
	if(msg.responseJSON.hasOwnProperty('genre'))
		$errors = $.merge($errors, msg.responseJSON.genre);
	console.log("cat: "+ msg.responseJSON.hasOwnProperty('categoria'));
	if(msg.responseJSON.hasOwnProperty('categoria'))
		$errors = $.merge($errors, msg.responseJSON.categoria);

	console.log($errors);

	$.each($errors, function(key, value){
					divError = divError + "<li>" + value + "</li>";
				  }				
	);
	
	divError = divError +"</ul></div>";			
	if($("#msg-error").length > 0){
		$("#msg-error").remove();
	}

	if ($(".modal-body").length > 0)
		$(".modal-body").prepend(divError);
	else
		$("#page-content").prepend(divError);
	
	$("body").css("cursor", "default");
}

function getGeneroFromModal(){
	return {genre: $("#genre").val(), active: $('input[name=active]').is(":checked") ? 1 : 0, categoria: $("#categoria").val()};
}

function setRegistrarGeneroClick(){
	$("#registrarGenero").click(
		function()
		{		
			var dado = getGeneroFromModal();
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
				data:dado,
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
				error: processaErroGenero,
			});
			
		}
	);
}