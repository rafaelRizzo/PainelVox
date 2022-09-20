<?php
require './config.php';
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-y H:i:s.') . gettimeofday()['usec'];

header('Content-Type: application/json');

$nome = $_POST['name'];
$cpfCnpj = $_POST['cpfcnpj'];
$rua = $_POST['rua'];
$numeroCasa = $_POST['numeroCasa'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$phonenum = $_POST['phonenum'];
$empresaName = $_POST['empresaName'];
$atendente = $_POST['atendente'];
$problema = $_POST['problema'];
$enviouvia = $_POST['enviouVia'];
$novaDTVencimento = $_POST['novaDTVencimento'];
$desbloqueou = $_POST['desbloqueou'];
$motivoCancelamento = $_POST['motivoCancelamento'];
$novaRua = $_POST['novaRua'];
$novoNumeroCasa = $_POST['novoNumeroCasa'];
$novoBairro = $_POST['novoBairro'];
$novaCidade = $_POST['novaCidade'];
$novoCEP = $_POST['novoCep'];
$novoTitularNome = $_POST['novoTitularNome'];
$novoTitularCPF = $_POST['novoTitularCPF'];
$novoTitularTelefone = $_POST['novoTitularTelefone'];
$novoTitularEmail = $_POST['novoTitularEmail'];
$dtNascimento = $_POST['dtNascimento'];
$cienteTaxa = $_POST['cienteTaxa'];
$obs = $_POST['obs'];

$enviouvia == "" ? $enviouvia = null : $enviouvia;
$novaDTVencimento == "" ? $novaDTVencimento = null : $novaDTVencimento;
$desbloqueou == "" ? $desbloqueou = null : $desbloqueou;
$motivoCancelamento == "" ? $motivoCancelamento = null : $motivoCancelamento;
$novaRua == "" ? $novaRua = null : $novaRua = mb_strtoupper($novaRua);
$novoNumeroCasa == "" ? $novoNumeroCasa = null : $novoNumeroCasa = mb_strtoupper($novoNumeroCasa);
$novoBairro == "" ? $novoBairro = null : $novoBairro = mb_strtoupper($novoBairro);
$novaCidade == "" ? $novaCidade = null : $novaCidade = mb_strtoupper($novaCidade);
$novoCEP == "" ? $novoCEP = null : $novoCEP = mb_strtoupper($novoCEP);
$novoTitularNome == "" ? $novoTitularNome = null : mb_strtoupper($novoTitularNome);
$novoTitularCPF == "" ? $novoTitularCPF = null : $novoTitularCPF = mb_strtoupper($novoTitularCPF);
$novoTitularTelefone == "" ? $novoTitularTelefone = null : $novoTitularTelefone = mb_strtoupper($novoTitularTelefone);
$novoTitularEmail == "" ? $novoTitularEmail = null : $novoTitularEmail = mb_strtoupper($novoTitularEmail);
$dtNascimento == "" ? $dtNascimento = null : $dtNascimento;
$cienteTaxa == "" ? $cienteTaxa = null : $cienteTaxa;
$obs == "" ? $obs = null : $obs = mb_strtoupper($obs);

$stmt = $pdo->prepare('INSERT INTO atendimentos_financeiro (
    nomeCliente,
    cpfCnpjCliente,
    ruaCliente,
    numeroCasaCliente,
    bairroCliente,
    cidadeCliente,
    telefoneCliente,
    empresaAtendida, 
    nomeAtendente,
    problemaCliente,
    enviouSegundaVia,
    fezODesbloqueio,
    motivoCancelamento,
    dataNovoVencimento,
    novaRua,
    novoNumeroCasa,
    novoBairro,
    novaCidade,
    novoCep,
    novoNomeTitular,
    novoCPFtitular,
    novoTelefoneContato,
    novoEmail,
    novaDataNascimento,
    cienteTaxa,
    obs,
    dataAtendimento
    ) 
    VALUES (    
    :nome,
    :cpfCnpj,
    :rua,
    :numcasa,
    :bairro,
    :cidade,
    :phonenum,
    :empresaName,
    :atendente,
    :problema,
    :enviouvia,
    :desbloqueou,
    :motivoCancelamento,
    :novaDTVencimento,
    :novaRua,
    :novoNumeroCasa,
    :novoBairro,
    :novaCidade,
    :novoCep,
    :novoNomeTitular,
    :novoCPFTitular,
    :novoTelefoneContato,
    :novoEmail,
    :novaDataNascimento,
    :cienteTaxa,
    :obs,
    :datahora
    )');

$stmt->bindValue(':nome', mb_strtoupper($nome));
$stmt->bindValue(':cpfCnpj', $cpfCnpj);
$stmt->bindValue(':rua', mb_strtoupper($rua));
$stmt->bindValue(':numcasa', mb_strtoupper($numeroCasa));
$stmt->bindValue(':bairro', mb_strtoupper($bairro));
$stmt->bindValue(':cidade', mb_strtoupper($cidade));
$stmt->bindValue(':phonenum', mb_strtoupper($phonenum));
$stmt->bindValue(':empresaName', mb_strtoupper($empresaName));
$stmt->bindValue(':atendente', mb_strtoupper($atendente));
$stmt->bindValue(':problema', $problema);
$stmt->bindValue(':enviouvia', $enviouvia);
$stmt->bindValue(':novaDTVencimento', $novaDTVencimento);
$stmt->bindValue(':desbloqueou', $desbloqueou);
$stmt->bindValue(':motivoCancelamento', $motivoCancelamento);
$stmt->bindValue(':novaRua', $novaRua);
$stmt->bindValue(':novoNumeroCasa', $novoNumeroCasa);
$stmt->bindValue(':novoBairro', $novoBairro);
$stmt->bindValue(':novaCidade', $novaCidade);
$stmt->bindValue(':novoCep', $novoCEP);
$stmt->bindValue(':novoNomeTitular', $novoTitularNome);
$stmt->bindValue(':novoCPFTitular', $novoTitularCPF);
$stmt->bindValue(':novoTelefoneContato', $novoTitularTelefone);
$stmt->bindValue(':novoEmail', $novoTitularEmail);
$stmt->bindValue(':novaDataNascimento', $dtNascimento);
$stmt->bindValue(':cienteTaxa', $cienteTaxa);
$stmt->bindValue(':obs', $obs);
$stmt->bindValue(':datahora', $date);
$stmt->execute();

if ($stmt->rowCount() >= 1) {
    echo json_encode('Salvo com sucesso');
} else {
    echo json_encode('Falha ao salvar');
}
