<?php
// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//
$data		=	date("Y-m-d");
$hora		=	date("H:i:s");
$novadata	=	substr($data,8,2) . "" .substr($data,5,2)."" ;
$novahora	=	substr($hora,0,2) . "" .substr($hora,3,2) . "";
$criandonossonumero="$novadata$novahora";//regra ficou diameshoraminuto

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 3;
$taxa_boleto = 2.50;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$valor_cobrado = "$valor"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["inicio_nosso_numero"] = "80";  // Carteira SR: 80, 81 ou 82  -  Carteira CR: 90 (Confirmar com gerente qual usar)
$dadosboleto["nosso_numero"] = "$criandonossonumero";  // Nosso numero sem o DV - REGRA: Máximo de 8 caracteres!
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
$dadosboleto["demonstrativo2"] = "Contribuição referente Sind Mot Ajud Cobr Op Maq ES<br>Taxa bancária - R$ ".$taxa_boleto;
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
$dadosboleto["conta_cedente"] = "009665"; // ContaCedente do Cliente, sem digito (Somente Números)
$dadosboleto["conta_cedente_dv"] = "14"; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = "CR";  // Código da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

// SEUS DADOS
$dadosboleto["identificacao"] = "Sind Mot Ajud Cobr Op Maq ES";
$dadosboleto["cpf_cnpj"] = "000.856.979/0001-02";
$dadosboleto["endereco"] = "Dr. Brício Mesquita, Nº 20 Bairro Maria Ortiz";
$dadosboleto["cidade_uf"] = "Cachoeiro de Itapemirim / ES";
$dadosboleto["cedente"] = "Sind Mot Ajud Cobr Op Maq ES";

// NÃO ALTERAR!
include("include/funcoes_cef.php"); 
include("include/layout_cef.php");
?>
