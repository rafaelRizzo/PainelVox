<?php
require './config.php';
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-y H:i:s.') . gettimeofday()['usec'];

header('Content-Type: application/json');

$nome = $_POST['name'];
$cpfCnpj = $_POST['cpfCnpj'];
$rua = $_POST['rua'];
$numeroCasa = $_POST['numeroCasa'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$phonenum = $_POST['phonenum'];
$empresaName = $_POST['empresaName'];
$atendente = $_POST['atendente'];
$problema = $_POST['problema'];
$ledLos = $_POST['los'];
$clienteFezProcedimentos = $_POST['clienteFezProcedimentos'];
$verificouCabos = $_POST['verificouCabos'];
$verificouFinanceiro = $_POST['verificouFinanceiro'];
$tecTipo = $_POST['tecTipo'];
$ONUstats = $_POST['ONUstats'];
$sinalONU = $_POST['sinalONU'];
$downTest = $_POST['downTest'];
$uploadTest = $_POST['uploadTest'];
$pingTest = $_POST['pingTest'];
$testeFeitoPelo = $_POST['testeFeitoPelo'];
$aparelhosComOProblema = $_POST['aparelhosComOProblema'];
$desdeQuando = $_POST['desdeQuando'];
$wifiAparece = $_POST['wifiAparece'];
$novoNomeRede = $_POST['novoNomeRede'];
$novaSenha = $_POST['novaSenha'];
$caboExternoOuInterno = $_POST['caboExternoOuInterno'];
$cienteTaxa = $_POST['cienteTaxa'];
$obs = $_POST['obs'];

$clienteFezProcedimentos == "" ? $clienteFezProcedimentos = null : $clienteFezProcedimentos = mb_strtoupper($clienteFezProcedimentos);
$verificouCabos == "" ? $verificouCabos = null : $verificouCabos = mb_strtoupper($verificouCabos);
$verificouFinanceiro == "" ? $verificouFinanceiro = null : $verificouFinanceiro = mb_strtoupper($verificouFinanceiro);
$tecTipo == "" ? $tecTipo = null : $tecTipo;
$ONUstats == "" ? $ONUstats = null : $ONUstats = mb_strtoupper($ONUstats);
$sinalONU == "" ? $sinalONU = null : $sinalONU = mb_strtoupper($sinalONU);
$downTest == "" ? $downTest = null : $downTest = mb_strtoupper($downTest);
$uploadTest == "" ? $uploadTest = null : $uploadTest = mb_strtoupper($uploadTest);
$pingTest == "" ? $pingTest = null : $pingTest = mb_strtoupper($pingTest);
$testeFeitoPelo == "" ? $testeFeitoPelo = null : $testeFeitoPelo = mb_strtoupper($testeFeitoPelo);
$aparelhosComOProblema == "" ? $aparelhosComOProblema = null : $aparelhosComOProblema = mb_strtoupper($aparelhosComOProblema);
$desdeQuando == "" ? $desdeQuando = null : $desdeQuando = mb_strtoupper($desdeQuando);
$wifiAparece == "" ? $wifiAparece = null : $wifiAparece = mb_strtoupper($wifiAparece);
$novoNomeRede == "" ? $novoNomeRede = null : $novoNomeRede;
$novaSenha == ""  ? $novaSenha = null : $novaSenha;
$caboExternoOuInterno == "" ? $caboExternoOuInterno = null : $caboExternoOuInterno = mb_strtoupper($caboExternoOuInterno);
$cienteTaxa == "" ? $cienteTaxa = null : $cienteTaxa = mb_strtoupper($cienteTaxa);
$obs == "" ? $obs = null : $obs = mb_strtoupper($obs);

$stmt = $pdo->prepare('INSERT INTO atendimentos_suporte (
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
    los,
    clienteFezProcedimentos,
    verificouCabos,
    verificouFinanceiro,
    tecTipos,
    ONUstats,
    sinalONU,
    donwloadTesteVel,
    uploadTesteVel,
    pingTesteVel,
    testeFeitoPor,
    quaisAparelhosProblema,
    desdeQuando,
    wifiAparece,
    novoNomeRede,
    novaSenha,
    caboExternoOuInterno,
    cienteTaxa,
    obs,
    dataAtendimento
    ) 
    VALUES (    
    :nome,
    :cpfCnpj,
    :rua,
    :numeroCasa,
    :bairro,
    :cidade,
    :phonenum,
    :empresaName,
    :atendente,
    :problema,
    :ledLos,
    :sempreFezProcedimentos,
    :sempreVerificouCabos,
    :sempreVerificouFinanceiro,
    :tecTipo,
    :ONUstats,
    :sinalONU,
    :downTest,
    :uploadTest,
    :pingTest,
    :testeFeitoPelo,
    :aparelhosComOProblema,
    :desdeQuando,
    :wifiAparece,
    :novoNomeRede,
    :novaSenha,
    :caboExternoOuInterno,
    :cienteTaxa,
    :obs,
    :datahora
    )');

$stmt->bindValue(':nome', mb_strtoupper($nome));
$stmt->bindValue(':cpfCnpj', mb_strtoupper($cpfCnpj));
$stmt->bindValue(':rua', mb_strtoupper($rua));
$stmt->bindValue(':numeroCasa', mb_strtoupper($numeroCasa));
$stmt->bindValue(':bairro', mb_strtoupper($bairro));
$stmt->bindValue(':cidade', mb_strtoupper($cidade));
$stmt->bindValue(':phonenum', mb_strtoupper($phonenum));
$stmt->bindValue(':empresaName', mb_strtoupper($empresaName));
$stmt->bindValue(':atendente', mb_strtoupper($atendente));
$stmt->bindValue(':problema', mb_strtoupper($problema));
$stmt->bindValue(':ledLos', mb_strtoupper($ledLos));
$stmt->bindValue(':sempreFezProcedimentos', $clienteFezProcedimentos);
$stmt->bindValue(':sempreVerificouCabos', $verificouCabos);
$stmt->bindValue(':sempreVerificouFinanceiro', $verificouFinanceiro);
$stmt->bindValue(':tecTipo', $tecTipo);
$stmt->bindValue(':ONUstats', $ONUstats);
$stmt->bindValue(':sinalONU', $sinalONU);
$stmt->bindValue(':downTest', $downTest);
$stmt->bindValue(':uploadTest', $uploadTest);
$stmt->bindValue(':pingTest', $pingTest);
$stmt->bindValue(':testeFeitoPelo', $testeFeitoPelo);
$stmt->bindValue(':aparelhosComOProblema', $aparelhosComOProblema);
$stmt->bindValue(':desdeQuando', $desdeQuando);
$stmt->bindValue(':wifiAparece', $wifiAparece);
$stmt->bindValue(':novoNomeRede', $novoNomeRede);
$stmt->bindValue(':novaSenha', $novaSenha);
$stmt->bindValue(':caboExternoOuInterno', $caboExternoOuInterno);
$stmt->bindValue(':cienteTaxa', $cienteTaxa);
$stmt->bindValue(':obs', $obs);
$stmt->bindValue(':datahora', $date);
$stmt->execute();

if ($stmt->rowCount() >= 1) {
    echo json_encode('Salvo com sucesso');
} else {
    echo json_encode('Falha ao salvar');
}
