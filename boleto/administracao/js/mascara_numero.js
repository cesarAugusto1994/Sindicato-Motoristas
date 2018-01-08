// JavaScript Document
/**********************************************************
* Pir@z-Stufz!!!! *
* -- mascara.js -- *
* *
* Script que reconhece uma mascara e formata o texto *
* do campo a que a máscara será aplicada. *
* *
* Linguagem : Java Script *
* Projeto: Script - Geral *
* Tipo: Script *
* Versão: Beta 1 *
* Desenvolvedor: Flávio Garcia - ViaCerrado *
* Contribuições: * *
* Data de criação: 03/10/2001 08:12:21 *
* Última atualização: 03/10/2001 11:40:10 *
* Licença: GNU *
* (Pode se divertir, mas se alterar me avisa belê?) *
* *
* Desenvolvimento - ViaCerrado *
* *
**********************************************************/
/*
mascara.js How - To.
Objetivo:

O script tem por objetivo formatar a entrada do dado no input.
Ele vai servir muito bem para datas, horas, datas e horas, cpf,
cgf e outras cositas mais que tenham tamanho fixo e sejam numé-
ricos.

OBS: Pois eh o script estah sem os ";" no final, pq eh JavaScript.
E quem disse que java script precisa.

O script contém 3 funções. A função que formata a máscara
é a FormataCampo.
Para chamar a função é necessário passar 3 atributos:

campo:

Que é o campo que será mascarado. Pode referenciar o campo como ele mesmo: this.

teclapres:

No caso você irá passar event
Por que event? Porque sim!!! Só coloca e naum recrama.
Brincadeira. Porque o objeto event está recebendo o
valor da tecla que foi recebida no keypress.

mascara:

A própria máscara que será aplicada ao campo.
ex: '##-##'
Tomando o exemplo da mascara acima. Quando o
usuário escrever 8888 no campo, será aplicada a máscara
e o valor no campo será 88-88.
Valores aceitos na mascara:

Para referenciar número, caracteres '#' e '9'.
Para referenciar traço, caracter '-'
Para referenciar separador de data, caracter '/'
Para referenciar separador de hora, caracter ':'
Para referenciar espaço, caracter ' '

É importante lembrar que o evento do campo que chama a função é onkeydown,
e que os valores size e maxlength tem que ser setados de acordo com a máscara.
Ou seja, mascara não controla o tamanho do campo.

Exemplo de chamada da função no formulário.


1º passo: chamar o arquivo, no caso dir_js eh o local onde vc vai colocar o bichaum!!!
<script src="dir_js/formata.js" type="text/javascript"></script>

2º passo: mandar a função no input!!!!
<form name="form1" action="teste.php">

<input type="Text" name="teste1" size="17" maxlength="17" onkeydown="FormataCampo(this,event,'##/##:##-## ##:##')">

</form>

Bugs:

Se o campo tiver um caracter já mascarado, e você apagar um caracter
antes da máscara e voltar a preencher depois da máscara, o campo vai ficar sujo.
Ex:Tomando a máscara ####-#####
Eu escrevi:99999 --> é aplicada a máscara --> 9999-9 se eu apagar o 4º9 e escrever
denovo vai ficar: 9999--9 entendeu?

Não aceita nem ctrl+v, nem ctrl+c.

Eu gostaria de colocar máscaras de letras, mas ainda não fiz.

*/ 
function FormataCampo(Campo,teclapres,mascara){
	//pegando o tamanho do texto da caixa de texto com delay de -1 no event
	//ou seja o caractere que foi digitado não será contado.
	strtext = Campo.value;
	tamtext = strtext.length;
	//pegando o tamanho da mascara;
	tammask = mascara.length;
	//criando um array para guardar cada caractere da máscara
	arrmask = new Array(tammask);
	//jogando os caracteres para o vetor
	for (var i = 0 ; i < tammask; i++){
		arrmask[i] = mascara.slice(i,i+1);
	}
	//alert (teclapres.keyCode)
	//começando o trabalho sujo
	if (((((arrmask[tamtext] == "#") || (arrmask[tamtext] == "9"))) || (((arrmask[tamtext+1] != "#") || (arrmask[tamtext+1] != "9"))))){
		if ((teclapres.keyCode >= 37 && teclapres.keyCode <= 40)||(teclapres.keyCode >= 48 && teclapres.keyCode <= 57)||(teclapres.keyCode >= 96 && teclapres.keyCode <= 105)||(teclapres.keyCode == 8)||(teclapres.keyCode == 9) ||(teclapres.keyCode == 46) ||(teclapres.keyCode == 13)){
		Organiza_Casa(Campo,arrmask[tamtext],teclapres.keyCode,strtext);
		}else{
			Detona_Event(Campo,strtext);
		}
	}else{//Aqui funcionaria a mascara para números mas eu ainda não implementei
		if ((arrmask[tamtext] == "A")) {
			charupper = event.valueOf();
			//charupper = charupper.toUpperCase()
			Detona_Event(Campo,strtext);
			masktext = strtext + charupper;
			Campo.value = masktext;
		}
	}
}
function Organiza_Casa(Campo,arrpos,teclapres_key,strtext){
	if (((arrpos == "/") || (arrpos == ".") || (arrpos == ",") || (arrpos == ":") || (arrpos == " ") || (arrpos == "-")) && !(teclapres_key == 8)){
		separador = arrpos;
		masktext = strtext + separador;
		Campo.value = masktext;
	}
}
function Detona_Event(Campo,strtext){
	event.returnValue = false;
	if (strtext != "") {
		Campo.value = strtext;
	}
}