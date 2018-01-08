<?php

foreach($_POST as $ind=>$val){
$$ind = $val;
} 

//CONFIGURAÇÕES SOBRE SEU SITE
$nome_do_site="PEGAB Auto Peças";
$email_para_onde_vai_a_mensagem = "tiagopessini@gmail.com";
$nome_de_quem_recebe_a_mensagem = "Curriculun Vitae";
$exibir_apos_enviar='enviado_curiculo.html';

//ESSA VARIAVEL DEFINE SE É O USUARIO QUEM DIGITA O ASSUNTO OU SE DEVE ASSUMIR O ASSUNTO DEFINIDO 
//POR VOCÊ CASO O USUARIO DEFINA O ASSUNTO PONHA "s" NO LUGAR DE "n" E CRIE O CAMPO DE NOME 
//'assunto' NO FORMULARIO DE ENVIO
$assunto_digitado_pelo_usuario="n";

//CONFIGURAÇOES DA MENSAGEM ORIGINAL
$cabecalho_da_mensagem_original="From: $name <$email>\n";
$assunto_da_mensagem_original="Curriculun Vitae";
$configuracao_da_mensagem_original="
Enviado por:\n
Nome: $nome\n
Data de Nascimento: $nascimento\n
Estado Civil: $est_civil\n
Endereço: $endereco\n
Numero: $numero\n
Bairro: $bairro\n
Cidade: $cidade\n
Estado: $estado\n
CEP: $cep\n
Telefone: $telefone\n
Celular: $celular\n
R.G.: $rg\n
CPF: $cpf\n
Carteira Profissional: $cart_profissional\n
Grupo Sanguineo: $grupo_sanguineo\n
RH: $rh\n
CNH: $cnh\n
Cat. CNH: $cat_cnh\n
E-mail: $email\n
Escolaridade: $escolaridade\n
Exp1. Função: $exp1_funcao\n
Exp1. Empresa: $exp1_empresa\n
Exp1. Telefone: $exp1_telefone\n
Exp1. Data entrada: $exp1_entrada\n
Exp1. Data saida: $exp1_saida\n
Exp2. Função: $exp2_funcao\n
Exp2. Empresa: $exp2_empresa\n
Exp2. Telefone: $exp2_telefone\n
Exp2. Data entrada: $exp2_entrada\n
Exp2. Data saida: $exp2_saida\n
Exp3. Função: $exp3_funcao\n
Exp3. Empresa: $exp3_empresa\n
Exp3. Telefone: $exp3_telefone\n
Exp3. Data entrada: $exp3_entrada\n
Exp3. Data saida: $exp3_saida\n
Outros Cursos: $outros_cursos\n
Outros Conhecimentos: $outros_conhecimentos\n
Enviado em: $date";

//CONFIGURAÇÕES DA MENSAGEM DE RESPOSTA
// CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO
// "Re: $assunto"
$assunto_da_mensagem_de_resposta = "EMAIL RECEBIDO";
$cabecalho_da_mensagem_de_resposta = "From: $nome_de_quem_recebe_a_mensagem - $nome_do_site <$email_para_onde_vai_a_mensagem>\n";
$configuracao_da_mensagem_de_resposta="Obrigado por enviar o seu curriculun vitae!\nEstaremos respondendo em breve...\nAtenciosamente,\n$nome_de_quem_recebe_a_mensagem - $nome_do_site\n\nEnviado em: $date";

?>