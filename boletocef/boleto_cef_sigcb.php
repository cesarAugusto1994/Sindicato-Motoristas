<?php

ini_set('display_errors', E_ALL);
ini_set('error_reporting', true);

//echo 'viva';

//include "../administracao/config/config.php";
//var_dump($_REQUEST);
require __DIR__ . '/../vendor/autoload.php';

//exit;
/*
			$documento = preg_replace('/[^0-9]/', '',$documento);
			$query  = "SELECT * FROM contribuintes WHERE documento = '$documento'";
			$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
			$verifica = mysql_num_rows($result);
			if ( $verifica >= "1" ) {
			//n�o grava o cliente
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
*/$result = [];
// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
$data		=	date("Y-m-d");
$hora		=	date("H:i:s");
$novadata	=	substr($data,8,2) . "" .substr($data,5,2)."" ;
$novahora	=	substr($hora,0,2) . "" .substr($hora,3,2) . "";
$criandonossonumero="$novadata$novahora";//regra ficou diameshoraminuto
$valor = $_POST['valor'];
$nome = $_POST['nome'];
$vencimento = $_POST['vencimento'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$cpf = $_POST['documento'];
// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 0;
$taxa_boleto = 0;
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";
$data_venc = "$vencimento";  // Prazo de X dias OU informe data: "13/04/2006";
$valor_cobrado = "$valor"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
//$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');
$valor_boleto = 0;
// Composi��o Nosso Numero - CEF SIGCB
$dadosboleto["nosso_numero1"] = "000"; // tamanho 3
$dadosboleto["nosso_numero_const1"] = "1"; //constanto 1 , 1=registrada , 2=sem registro
$dadosboleto["nosso_numero2"] = "000"; // tamanho 3
$dadosboleto["nosso_numero_const2"] = "4"; //constanto 2 , 4=emitido pelo proprio cliente
$dadosboleto["nosso_numero3"] = "$criandonossonumero"; // tamanho 9

$dadosboleto["numero_documento"] = "$documento";	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

$dataVencto = \DateTime::createFromFormat('d/m/Y', $data_venc);

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = "$nome";
$dadosboleto["endereco1"] = "$endereco";
$dadosboleto["endereco2"] = "$cidade - $estado -  CEP: $cep";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo"] = [
	"Pagamento de Contribuição com o Sindicato",
	"Contribuição referente Sind Mot Ajud Cobr Op Maq ES, http://www.sindimotoristas.com.br",
	"SAC CAIXA: 0800 726 0101 (informações, reclamações, sugestões e elogios)",
	"Para pessoas com deficiência auditiva ou de fala: 0800 726 2492",
	"Ouvidoria: 0800 725 7474, caixa.gov.br"
];

$dadosboleto["instrucoes"] = [
"- Este título pode ser pago até o vencimento em qualquer agência",
"- Após o vencimento, o título só poderá ser pago nas agências da",
"- CAIXA, e casas lotéricas, ",
"- Pagamento efetuado com cheque, reconhecido após a liquidação"
];

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";

// DADOS DA SUA CONTA - CEF
$dadosboleto["agencia"] = "2016"; // Num da agencia, sem digito
$dadosboleto["conta"] = "522"; 	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "0"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - CEF
$dadosboleto["conta_cedente"] = "009665-2"; // C�digo Cedente do Cliente, com 6 digitos (Somente N�meros)
$dadosboleto["carteira"] = "CR";  // C�digo da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

// SEUS DADOS
$dadosboleto["identificacao"] = "Sindimotoristas";
$dadosboleto["cpf_cnpj"] = "000.856.979/0001-02";
$dadosboleto["endereco"] = "Dr. Brício Mesquita, Nº 20 Bairro Maria Ortiz";
$dadosboleto["cidade"] = "Cachoeiro de Itapemirim";
$dadosboleto["uf"] = "ES";
$dadosboleto["cedente"] = "SINDICATO DOS MOTORISTAS, AJUD, COBR E OP DE MAQ PNEUS DO SUL DO EST DO ESPIRITO SANTO";

include("include/funcoes_cef_sigcb.php");

$beneficiario = new \Eduardokum\LaravelBoleto\Pessoa(
    [
        'nome'      => strtoupper($dadosboleto["cedente"]),
        'endereco'  => $dadosboleto["endereco"],
        'cep'       => '29300-750',
        'uf'        => $dadosboleto["uf"],
        'cidade'    => $dadosboleto["cidade"],
        'documento' => $dadosboleto["cpf_cnpj"],
    ]
);
$pagador = new \Eduardokum\LaravelBoleto\Pessoa(
    [
        'nome'      => $dadosboleto["sacado"],
        'endereco'  => $dadosboleto["endereco1"],
        'bairro'    => $bairro,
        'cep'       => $cep,
        'uf'        => $estado,
        'cidade'    => $cidade,
        'documento' => $cpf,
    ]
);
$boleto = new Eduardokum\LaravelBoleto\Boleto\Banco\Caixa(
    [
        'logo'                   => __DIR__ . '/../vendor/eduardokum/laravel-boleto/logos/104.png',
        'dataVencimento'         => new \Carbon\Carbon($dataVencto->format('Ymd')),
        'valor'                  => $valor_cobrado,
        'multa'                  => false,
        'juros'                  => false,
        'numero'                 => 18,
        'numeroDocumento'        => 1,
        'pagador'                => $pagador,
        'beneficiario'           => $beneficiario,
        'agencia'                => $dadosboleto["agencia"],
        'conta'                  => $dadosboleto["conta_cedente"],
        'carteira'               => 'RG',
        'codigoCliente'          => $dadosboleto["conta_cedente"],
        'descricaoDemonstrativo' => $dadosboleto["demonstrativo"],
        'instrucoes'             => $dadosboleto["instrucoes"],
        'aceite'                 => 'S',
        'especieDoc'             => 'DM',
    ]
);
$pdf = new Eduardokum\LaravelBoleto\Boleto\Render\Pdf();
$pdf->addBoleto($boleto);
$pdf->gerarBoleto($pdf::OUTPUT_SAVE, __DIR__ . DIRECTORY_SEPARATOR . 'arquivos' . DIRECTORY_SEPARATOR . 'cef.pdf');

//include("include/layout_cef.php");

// gerar o registro no lan�amento de boletos
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
				//$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());

?>
