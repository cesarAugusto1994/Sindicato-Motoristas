// JavaScript Document
/**********************************************************
* Pir@z-Stufz!!!! *
* -- mascara.js -- *
* *
* Script que reconhece uma mascara e formata o texto *
* do campo a que a m�scara ser� aplicada. *
* *
* Linguagem : Java Script *
* Projeto: Script - Geral *
* Tipo: Script *
* Vers�o: Beta 1 *
* Desenvolvedor: Fl�vio Garcia - ViaCerrado *
* Contribui��es: * *
* Data de cria��o: 03/10/2001 08:12:21 *
* �ltima atualiza��o: 03/10/2001 11:40:10 *
* Licen�a: GNU *
* (Pode se divertir, mas se alterar me avisa bel�?) *
* *
* Desenvolvimento - ViaCerrado *
* *
**********************************************************/
/*
mascara.js How - To.
Objetivo:

O script tem por objetivo formatar a entrada do dado no input.
Ele vai servir muito bem para datas, horas, datas e horas, cpf,
cgf e outras cositas mais que tenham tamanho fixo e sejam num�-
ricos.

OBS: Pois eh o script estah sem os ";" no final, pq eh JavaScript.
E quem disse que java script precisa.

O script cont�m 3 fun��es. A fun��o que formata a m�scara
� a FormataCampo.
Para chamar a fun��o � necess�rio passar 3 atributos:

campo:

Que � o campo que ser� mascarado. Pode referenciar o campo como ele mesmo: this.

teclapres:

No caso voc� ir� passar event
Por que event? Porque sim!!! S� coloca e naum recrama.
Brincadeira. Porque o objeto event est� recebendo o
valor da tecla que foi recebida no keypress.

mascara:

A pr�pria m�scara que ser� aplicada ao campo.
ex: '##-##'
Tomando o exemplo da mascara acima. Quando o
usu�rio escrever 8888 no campo, ser� aplicada a m�scara
e o valor no campo ser� 88-88.
Valores aceitos na mascara:

Para referenciar n�mero, caracteres '#' e '9'.
Para referenciar tra�o, caracter '-'
Para referenciar separador de data, caracter '/'
Para referenciar separador de hora, caracter ':'
Para referenciar espa�o, caracter ' '

� importante lembrar que o evento do campo que chama a fun��o � onkeydown,
e que os valores size e maxlength tem que ser setados de acordo com a m�scara.
Ou seja, mascara n�o controla o tamanho do campo.

Exemplo de chamada da fun��o no formul�rio.


1� passo: chamar o arquivo, no caso dir_js eh o local onde vc vai colocar o bichaum!!!
<script src="dir_js/formata.js" type="text/javascript"></script>

2� passo: mandar a fun��o no input!!!!
<form name="form1" action="teste.php">

<input type="Text" name="teste1" size="17" maxlength="17" onkeydown="FormataCampo(this,event,'##/##:##-## ##:##')">

</form>

Bugs:

Se o campo tiver um caracter j� mascarado, e voc� apagar um caracter
antes da m�scara e voltar a preencher depois da m�scara, o campo vai ficar sujo.
Ex:Tomando a m�scara ####-#####
Eu escrevi:99999 --> � aplicada a m�scara --> 9999-9 se eu apagar o 4�9 e escrever
denovo vai ficar: 9999--9 entendeu?

N�o aceita nem ctrl+v, nem ctrl+c.

Eu gostaria de colocar m�scaras de letras, mas ainda n�o fiz.

*/ 
function FormataCampo(Campo,teclapres,mascara){
	//pegando o tamanho do texto da caixa de texto com delay de -1 no event
	//ou seja o caractere que foi digitado n�o ser� contado.
	strtext = Campo.value;
	tamtext = strtext.length;
	//pegando o tamanho da mascara;
	tammask = mascara.length;
	//criando um array para guardar cada caractere da m�scara
	arrmask = new Array(tammask);
	//jogando os caracteres para o vetor
	for (var i = 0 ; i < tammask; i++){
		arrmask[i] = mascara.slice(i,i+1);
	}
	//alert (teclapres.keyCode)
	//come�ando o trabalho sujo
	if (((((arrmask[tamtext] == "#") || (arrmask[tamtext] == "9"))) || (((arrmask[tamtext+1] != "#") || (arrmask[tamtext+1] != "9"))))){
		if ((teclapres.keyCode >= 37 && teclapres.keyCode <= 40)||(teclapres.keyCode >= 48 && teclapres.keyCode <= 57)||(teclapres.keyCode >= 96 && teclapres.keyCode <= 105)||(teclapres.keyCode == 8)||(teclapres.keyCode == 9) ||(teclapres.keyCode == 46) ||(teclapres.keyCode == 13)){
		Organiza_Casa(Campo,arrmask[tamtext],teclapres.keyCode,strtext);
		}else{
			Detona_Event(Campo,strtext);
		}
	}else{//Aqui funcionaria a mascara para n�meros mas eu ainda n�o implementei
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