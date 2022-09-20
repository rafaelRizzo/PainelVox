<?php
require './config.php';
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-y H:i:s.') . gettimeofday()['usec'];

header('Content-Type: application/json');

$nome = $_POST['name'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$numeroCasa = $_POST['numeroCasa'];
$bairro = $_POST['bairro'];
$empresaName = $_POST['empresaName'];
$atendente = $_POST['atendente'];
$nasc = $_POST['nasc'];
$phonenum = $_POST['phonenum'];
$email = $_POST['email'];
$obs = $_POST['obs'];

$obs == "" ? $obs = null : $obs = mb_strtoupper($obs);

$stmt = $pdo->prepare('INSERT INTO atendimentos_comercial (
    nomeCliente,
    Cep, 
    cidadeCliente,	
    ruaCliente, 
    numeroCasaCliente, 
    bairroCliente, 
    empresaAtendida, 
    nomeAtendente, 
    dataNascimento, 
    telefoneCliente, 
    emailCliente, 
    obs,
    dataAtendimento
 ) 
 VALUES (:nome, :cep, :cidade, :rua, :numeroCasa, :bairro, :empresaName, :atendente, :nasc, :phonenum, :email, :obs, :datahora)');

$stmt->bindValue(':nome', mb_strtoupper($nome));
$stmt->bindValue(':cep', $cep);
$stmt->bindValue(':cidade', mb_strtoupper($cidade));
$stmt->bindValue(':rua', mb_strtoupper($rua));
$stmt->bindValue(':numeroCasa', mb_strtoupper($numeroCasa));
$stmt->bindValue(':bairro', mb_strtoupper($bairro));
$stmt->bindValue(':empresaName', mb_strtoupper($empresaName));
$stmt->bindValue(':atendente', mb_strtoupper($atendente));
$stmt->bindValue(':nasc', $nasc);
$stmt->bindValue(':phonenum', mb_strtoupper($phonenum));
$stmt->bindValue(':email', $email);
$stmt->bindValue(':obs', $obs);
$stmt->bindValue(':datahora', $date);
$stmt->execute();


if ($stmt->rowCount() >= 1) {
    echo json_encode('Salvo com sucesso');
} else {
    echo json_encode('Falha ao salvar');
}
