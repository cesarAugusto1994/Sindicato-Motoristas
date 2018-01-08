function initValidation(){
		var objForm = document.getElementById('frmCadastroBasicas')
		//validação de cpf
		objForm.txtCPF.required = 1;
		objForm.txtCPF.err = 'Entre com CPF válido!';
		//validação de rg
		objForm.txtRG.required = 1;
		objForm.txtRG.err = 'Entre com RG válido!';
		//Validação de email
		objForm.txtEmail.required = 1;
		objForm.txtEmail.regexp = /^\w*$/;
		objForm.txtEmail.err = 'Entre com E-mail válido!';
		objForm.txtEmail.regexp = "JSVAL_RX_EMAIL";
		//Confrimação da validade de email
		objForm.txtConfEmail.equals = 'txtEmail';
		objForm.txtConfEmail.err = 'Emails digitados não conferem.';
		//Validação do apelido
		objForm.txtApelido.required = 1;
		objForm.txtApelido.err = 'Entre com apelido válido !';
		//Validação da senha
		objForm.txtSenha.required = 1;
		objForm.txtSenha.maxlength= 8;
		objForm.txtSenha.minlength = 3;
		objForm.txtSenha.err = 'Entre com uma senha válida !';
		//Validação de data
		
		//Validação de pais
		
		//validação de estado
		
		//validação de cidade
		
		//validação de Bairro
		objForm.txtBairro.required = 1;
		objForm.txtBairro.err = 'Entre com Bairro válido!';
		//Validação de cep
		objForm.txtCep.required = 1;
		objForm.txtCep.regexp = "JSVAL_RX_ZIP";
		objForm.txtCep.err = 'Entre com CEP válido!';
		}
		

		
