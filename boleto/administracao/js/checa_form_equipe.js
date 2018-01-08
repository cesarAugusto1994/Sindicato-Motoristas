function checa_formulario_sistema(F1){
	if(F1.canal.value == 0){
		alert('Por favor selecione o campo Canal!');
		F1.canal.focus();
		return false;
	}
	if(F1.super.value == ''){
		alert('Por favor selecione o campo de Supervisor!');
		F1.super.focus();
		return false;
	}
	if(F1.equipe.value == 0){
		alert('Por favor selecione o campo de Equipe!');
		F1.equipe.focus();
		return false;
	}
	if(F1.conexao1.value == 0){
		alert('Por favor preencha o campo de Conexão!');
		F1.conexao1.focus();
		return false;
	}
	if(F1.venda1.value == 0){
		alert('Por favor preencha o campo de Venda!');
		F1.venda1.focus();
		return false;
	}else{
		return true;
	}
}