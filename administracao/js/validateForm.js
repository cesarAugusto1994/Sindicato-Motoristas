function initValidation(){
		var objForm = document.getElementById('frmCadastroBasicas')
		//valida��o de cpf
		objForm.txtCPF.required = 1;
		objForm.txtCPF.err = 'Entre com CPF v�lido!';
		//valida��o de rg
		objForm.txtRG.required = 1;
		objForm.txtRG.err = 'Entre com RG v�lido!';
		//Valida��o de email
		objForm.txtEmail.required = 1;
		objForm.txtEmail.regexp = /^\w*$/;
		objForm.txtEmail.err = 'Entre com E-mail v�lido!';
		objForm.txtEmail.regexp = "JSVAL_RX_EMAIL";
		//Confrima��o da validade de email
		objForm.txtConfEmail.equals = 'txtEmail';
		objForm.txtConfEmail.err = 'Emails digitados n�o conferem.';
		//Valida��o do apelido
		objForm.txtApelido.required = 1;
		objForm.txtApelido.err = 'Entre com apelido v�lido !';
		//Valida��o da senha
		objForm.txtSenha.required = 1;
		objForm.txtSenha.maxlength= 8;
		objForm.txtSenha.minlength = 3;
		objForm.txtSenha.err = 'Entre com uma senha v�lida !';
		//Valida��o de data
		
		//Valida��o de pais
		
		//valida��o de estado
		
		//valida��o de cidade
		
		//valida��o de Bairro
		objForm.txtBairro.required = 1;
		objForm.txtBairro.err = 'Entre com Bairro v�lido!';
		//Valida��o de cep
		objForm.txtCep.required = 1;
		objForm.txtCep.regexp = "JSVAL_RX_ZIP";
		objForm.txtCep.err = 'Entre com CEP v�lido!';
		}
		

		
