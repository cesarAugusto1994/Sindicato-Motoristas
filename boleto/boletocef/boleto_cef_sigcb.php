<?php
			include "../administracao/config/config.php";
			$documento = preg_replace('/[^0-9]/', '',$documento);
			$query  = "SELECT * FROM contribuintes WHERE documento = '$documento'";
			$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
			$verifica = mysql_num_rows($result);
			if ( $verifica >= "1" ) {
			//não grava o cliente
			} else {
			//grava o cliente
			$query = "
			INSERT INTO contribuintes(
			nome,documento,endereco,cidade,estado,cep,data,hora,ip,status
			)VALUES(
			'$nome','$documento','$endereco','$cidade','$estado','$cep','$data','$hora','$REMOTE_ADDR','A'
			)";
			$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());				
			} 

// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
$data		=	date("Y-m-d");
$hora		=	date("H:i:s");
$novadata	=	substr($data,8,2) . "" .substr($data,5,2)."" ;
$novahora	=	substr($hora,0,2) . "" .substr($hora,3,2) . "";
$criandonossonumero="$novadata$novahora";//regra ficou diameshoraminuto

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 0;
$taxa_boleto = 0;
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";
$data_venc = "$vencimento";  // Prazo de X dias OU informe data: "13/04/2006";
$valor_cobrado = "$valor"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

// Composição Nosso Numero - CEF SIGCB
$dadosboleto["nosso_numero1"] = "000"; // tamanho 3
$dadosboleto["nosso_numero_const1"] = "2"; //constanto 1 , 1=registrada , 2=sem registro
$dadosboleto["nosso_numero2"] = "000"; // tamanho 3
$dadosboleto["nosso_numero_const2"] = "4"; //constanto 2 , 4=emitido pelo proprio cliente
$dadosboleto["nosso_numero3"] = "$criandonossonumero"; // tamanho 9


$dadosboleto["numero_documento"] = "$documento";	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = "$nome";
$dadosboleto["endereco1"] = "$endereco";
$dadosboleto["endereco2"] = "$cidade - $estado -  CEP: $cep";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Contribuição com o Sindicato";
$dadosboleto["demonstrativo2"] = "Contribuição referente Sind Mot Ajud Cobr Op Maq ES";
$dadosboleto["demonstrativo3"] = "http://www.sindimotoristas.com.br";

// INSTRUÇÕES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Este título pode ser pago até o vencimento em qualquer agência";
$dadosboleto["instrucoes2"] = "- Caixa Econômica Federal ou bancos participantes do sistema";
$dadosboleto["instrucoes3"] = "- Após o vencimento, o título só poderá ser pago nas agências da";
$dadosboleto["instrucoes4"] = "- CAIXA, e casas lotéricas - Pagamento efetuado com cheque, reconhecido após a liquidação";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - CEF
$dadosboleto["agencia"] = "2016"; // Num da agencia, sem digito
$dadosboleto["conta"] = "522"; 	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "0"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - CEF
$dadosboleto["conta_cedente"] = "009665"; // Código Cedente do Cliente, com 6 digitos (Somente Números)
$dadosboleto["carteira"] = "SR";  // Código da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

// SEUS DADOS
$dadosboleto["identificacao"] = "Sindimotoristas";
$dadosboleto["cpf_cnpj"] = "000.856.979/0001-02";
$dadosboleto["endereco"] = "Dr. Brício Mesquita, Nº 20 Bairro Maria Ortiz";
$dadosboleto["cidade_uf"] = "Cachoeiro de Itapemirim / ES";
$dadosboleto["cedente"] = "Sindicatos dos Motoristas do sul do Espírito Santo";

// NÃO ALTERAR!
include("include/funcoes_cef_sigcb.php"); 
include("include/layout_cef.php");


// gerar o registro no lançamento de boletos
				$query = "
				INSERT INTO boletos(
				documento_contribuinte,
				nossonumero,
				valor,
				vencimento,
				data,
				hora,
				ip,
				status
				)VALUES(
				'$documento',
				'$nossonumero',
				'".number_format($valor_boleto,2,".","")."',
				'".substr($data_venc,6,4) . "-" .substr($data_venc,3,2) . "-" . substr($data_venc,0,2)."',
				'$data',
				'$hora',
				'$REMOTE_ADDR',
				'NB'					
				)";
				$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());	

?>