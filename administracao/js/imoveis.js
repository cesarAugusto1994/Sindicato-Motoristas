$().ready(function() {
	$("img#loading").hide();
	$("input[@name=ADDcomplemento]").click(function(){
		$("img#loading").show();
		$.post('Ajax/Ajax_imoveis_adicionacomplemento.php',
			{ Complemento : $('input[@name=complemento]').val() },
			function(resposta){
				if (resposta){
					$('input[@name=complemento]').val(resposta);
					
				}else{
					$('input[@name=complemento]').val(resposta);

				}
				$("img#loading").hide();
				RetornaComplementos();
			}
		);
	
	});
	$("select[@name=listFinalidade]").change(function(){
		$('select[@name=Tipo]').html('<option value="sda">Procurando :::::::</option>');
		$.post('Ajax/Ajax_imoveis_tipo.php', 
			{ Finalidade : $(this).val() }, 
			function(resposta){
				
				$('select[@name=Tipo]').html(resposta);
			}
			
		);
	});
	RetornaComplementos();
	$.ajaxTimeout( 5000 );
});

function RetornaComplementos(){
	if ($("input[@name=idimovel]").val() == null){
		var id_imovel = 'vazio';
	}else{
		var id_imovel = $("input[@name=idimovel]").val();
	}
	$("#TodosComplementos").html('<br /><img id="loading" src="imagens/loading.gif" alt="Loading..." /><br />');
	$.post("Ajax/Ajax_todoscomplementos.php",
	   { IDimovel : id_imovel },
	   function(res){
		   $("#TodosComplementos").html(res);
		   
	   }
								 
	);
}

function Apaga(id){
	$.post('Ajax/Ajax_apaga_complemento.php',
		{ ID : id },
		function(resposta){
			if (resposta != true){
				alert(resposta);
			}
		}
	);
	RetornaComplementos();
}