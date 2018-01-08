function checa_formulario_sistema(F1){
	if(F1.cliente1.value == 0){
		alert('Por favor selecione o Cliente!');
		F1.cliente1.focus();
		return false;
	}
	if(F1.cesta.value == ''){
		alert('Por favor adicione pelo menos 1 Produto a cesta!');
		F1.cesta.focus();
		return false;
	}else{
		return true;
	}
}