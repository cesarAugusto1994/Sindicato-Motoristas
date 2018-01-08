function checa_formulario_sistema(F1){
	function validarData(campo){
		var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
		if ((campo.value.match(expReg)) && (campo.value!='')){
			var dia = campo.value.substring(0,2);
			var mes = campo.value.substring(3,5);
			var ano = campo.value.substring(6,10);
			if(mes==4 || mes==6 || mes==9 || mes==11 && dia > 30){
				alert("Dia incorreto !!! O mês especificado contém no máximo 30 dias.");
				campo.focus();
				return false;
				
			}else{
				if(ano%4!=0 && mes==2 && dia>28){
					alert("Data incorreta!! O mês especificado contém no máximo 28 dias.");
					campo.focus();
					return false;
				}else{
					if(ano%4==0 && mes==2 && dia>29){
						alert("Data incorreta!! O mês especificado contém no máximo 29 dias.");
						campo.focus();
						return false;
					} else{
						return true;
					}
				}
			}
		}else{
			alert('Formato inválido de data, formato correto é Dia/Mes/Ano');
			campo.focus();
			return false;
		}
	}
	if(validarData(F1.datainicial) == false){
		return false;
		campo.focus();
	}
	if(validarData(F1.datafinal) == false){
		return false;
		campo.focus();
	}else{
		return true;
	}
}