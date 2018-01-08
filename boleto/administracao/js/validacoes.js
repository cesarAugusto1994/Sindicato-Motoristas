// JavaScript Document
function checa_formulario_usuario(F1) {
	//--------------------------------------------------
	//------------validar campos------------------------
	//--------------------------------------------------	
	if (F1.nome.value == "") {
		alert ("Favor preencher o campo Nome!");
		F1.nome.focus();
		return false;
	}
	if (F1.email.value == "") {
		alert ("Favor preencher o campo E-Mail!");
		F1.email.focus();
		return false;
	} else {
		var str = F1.email.value;
		/*var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;*/
		var filter = /^[\w-]+(\.[\w-]+)*@(([\w-]{2,63}\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/i;
		if(filter.test(str)){		  
		}else{
			alert("Este endereço de e-mail não é válido!");
			F1.email.focus();
			return false; 
		}		
		
	}
	if (F1.rg.value == "") {
		alert ("Favor preencher o campo RG!");
		F1.rg.focus();
		return false;
	}
	if (F1.cpf.value == "") {
		alert ("Favor preencher o campo CPF!");
		F1.cpf.focus();
		return false;
	}
	if (F1.endereco.value == "") {
		alert ("Favor preencher o campo Endereço!");
		F1.endereco.focus();
		return false;
	}
	if (F1.bairro.value == "") {
		alert ("Favor preencher o campo Bairro!");
		F1.bairro.focus();
		return false;
	}
	if (F1.cidade.value == "") {
		alert ("Favor preencher o campo Cidade!");
		F1.cidade.focus();
		return false;
	}
	if (F1.estado.value == "") {
		alert ("Favor preencher o campo Estado!");
		F1.estado.focus();
		return false;
	}
	if (F1.cep.value == "") {
		alert ("Favor preencher o campo CEP!");
		F1.cep.focus();
		return false;
	}
	if (F1.telefone.value == "") {
		alert ("Favor preencher o campo Telefone!");
		F1.telefone.focus();
		return false;
	}	
	if (F1.login.value == "") {
		alert ("Favor preencher o campo Login!");
		F1.login.focus();
		return false;
	}
	if (F1.senha.value == "") {
		alert ("Favor preencher o campo Senha!");
		F1.senha.focus();
		return false;
	} else {
		return (true);
	}
}
function cadastro(){
	document.getElementById('cadastro').style.display='block';
	document.getElementById('esqueci').style.display='none';
	document.getElementById('erro').style.display='none';
}
function esqueci(){	
	document.getElementById('cadastro').style.display='none';
	document.getElementById('esqueci').style.display='block';
	document.getElementById('erro').style.display='none';
}

