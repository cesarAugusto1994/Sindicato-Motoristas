function checa_formulario_sistema(form1){
	if(form1.nomeA.value == 0){
		alert('Por favor preencha o campo nome!');
		form1.nomeA.focus();
		return false;
	}
	if(form1.contratacao1.value == ''){
		alert('Por favor selecione o campo de Contratação!');
		form1.contratacao1.focus();
		return false;
	}
	if(form1.cargo1.value == 0){
		alert('Por favor selecione o campo de Cargo!');
		form1.cargo1.focus();
		return false;
	}
	if(form1.salario1.value == 0){
		alert('Por favor preencha o campo de Salário!');
		form1.salario1.focus();
		return false;
	}
	var invalid, s;
	invalid = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	var s;

// inicio de verificacao de cnpj ou cpf
	if (form1.documentoA.value.length == 0) {
		return true; 
	}else{
	s = limpa_string(form1.documentoA.value);

	// checa se é cpf
	if (s.length == 11){
		if (valida_CPF(form1.documentoA.value) == false ){
			alert("O CPF não é válido !");
			form1.documentoA.select();
			return false;
		}
	}
	// checa se é cgc
	else if (s.length == 14) {
		if (valida_CGC(form1.documentoA.value) == false ) {
			alert("O CNPJ não é válido !");
			form1.documentoA.select();
			return false; 
		}
	}else{
		alert("O CPF/CNPJ não é válido !");
		form1.documentoA.select();
		return false;
	}
// final da verificacao de cnpj ou cpf
}
// fim da funcao validar()


	function limpa_string(S){
		// Deixa so' os digitos no numero
		var Digitos = "0123456789";
		var temp = "";
		var digito = "";
		
		for (var i=0; i<S.length; i++) {
			digito = S.charAt(i);
			if (Digitos.indexOf(digito)>=0){
				temp=temp+digito 
			}
		} //for
		return temp
	}
	// fim da funcao


function valida_CPF(s) {
var i;
s = limpa_string(s);
var c = s.substr(0,9);
var dv = s.substr(9,2);
var d1 = 0;
for (i = 0; i < 9; i++)
{
d1 += c.charAt(i)*(10-i);
}
if (d1 == 0) return false;
d1 = 11 - (d1 % 11);
if (d1 > 9) d1 = 0;
if (dv.charAt(0) != d1)
{
return false;
}

d1 *= 2;
for (i = 0; i < 9; i++)
{
d1 += c.charAt(i)*(11-i);
}
d1 = 11 - (d1 % 11);
if (d1 > 9) d1 = 0;
if (dv.charAt(1) != d1)
{
return false;
}
return true;
}

 function valida_CGC(s) {
                 CNPJ = s;
                 erro = new String;
                 if (CNPJ.length < 18) erro += "É necessario preencher corretamente o número do CNPJ! \n\n";
                 if ((CNPJ.charAt(2) != ".") || (CNPJ.charAt(6) != ".") || (CNPJ.charAt(10) != "/") || (CNPJ.charAt(15) != "-")){
                 if (erro.length == 0) erro += "É necessário preencher corretamente o número do CNPJ! \n\n";
                 }
                 //substituir os caracteres que não são números
               if(document.layers && parseInt(navigator.appVersion) == 4){
                       x = CNPJ.substring(0,2);
                       x += CNPJ. substring (3,6);
                       x += CNPJ. substring (7,10);
                       x += CNPJ. substring (11,15);
                       x += CNPJ. substring (16,18);
                       CNPJ = x;
               } else {
                       CNPJ = CNPJ. replace (".","");
                       CNPJ = CNPJ. replace (".","");
                       CNPJ = CNPJ. replace ("-","");
                       CNPJ = CNPJ. replace ("/","");
               }
               var nonNumbers = /\D/;
               if (nonNumbers.test(CNPJ)) erro += "A verificação de CNPJ suporta apenas números! \n\n";
               var a = [];
               var b = new Number;
               var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
               for (i=0; i<12; i++){
                       a[i] = CNPJ.charAt(i);
                       b += a[i] * c[i+1];
 }
               if ((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
               b = 0;
               for (y=0; y<13; y++) {
                       b += (a[y] * c[y]);
               }
               if ((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
               if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])){
                       erro +="Dígito verificador com problema!";
               }
               if (erro.length > 0){
                       alert(erro);
                       return false;
               } else {
                       
               }
               return true;
       }
	   }// JavaScript Document// JavaScript Document