<?php
include "./db/config.php";

$info = [];


$id = filter_input(INPUT_GET, 'id');

if ($id) {

    $sql = $pdo->prepare("SELECT * FROM atendimentos_suporte WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mais informações do atendimento</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- LOADER -->
    <div class="loader-wrapper">
        <span class="loader">
            <span class="loader-inner">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </span>
        </span>
    </div>
    <!-- LOADER -->
    <div class="containerLeft">
        <nav>
            <img class="btnMobile" src="./list.svg">

            <ul>
                <div class="menuTop">
                    <img class="logo" src="./logo.png">

                    <li class="d-none">
                        <a href="./index.php">
                            <img src="./home.svg">
                        </a>
                    </li>

                    <li class="d-none">
                        <a href="./dashboard.php">
                            <img src="./dashboard.svg" alt="">
                        </a>
                    </li>

                    <li class="active">
                        <a href="./test.php">
                            <img src="./search.svg" alt="">
                        </a>
                    </li>
                </div>

                <div class="menuBot">
                    <li>
                        <a href="#">
                            <img src="./settings.svg" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./account.svg" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./leave.svg" alt="">
                        </a>
                    </li>
                </div>
            </ul>
        </nav>

        <div class="containerMain ">
            <h2>Informações do atendimento</h2>

            <div class="containerSection">
                <h4>Atendimento</h4>
                <div class="infoContainer">
                    <label class="" for="problema">Problema:
                        <input class="form-control" type="text" name="problema" id="problema" disabled value="<?= $info['problemaCliente']; ?>">
                    </label>
                    <label class="" for="id">ID:
                        <input class="form-control" type="text" name="id" disabled value="<?= $info['id']; ?>">
                    </label>
                    <label class="" for="name">Nome:
                        <input class="form-control" type="text" name="name" disabled value="<?= $info['nomeCliente']; ?>">
                    </label>
                    <label class="" for="cpfCnpj">CPF/CNPJ:
                        <input class="form-control" type="text" name="cpfCnpj" disabled value="<?= $info['cpfCnpjCliente']; ?>">
                    </label>
                    <label class="" for="rua">Rua:
                        <input class="form-control" type="text" name="rua" disabled value="<?= $info['ruaCliente']; ?>">
                    </label>
                    <label class="" for="numCasa">Nº Casa:
                        <input class="form-control" type="text" name="numCasa" disabled value="<?= $info['numeroCasaCliente']; ?>">
                    </label>
                    <label class="" for="bairro">Bairro:
                        <input class="form-control" type="text" name="bairro" disabled value="<?= $info['bairroCliente']; ?>">
                    </label>
                    <label class="" for="cidade">Cidade:
                        <input class="form-control" type="text" name="cidade" disabled value="<?= $info['cidadeCliente']; ?>">
                    </label>
                    <label class="" for="telefone">Telefone:
                        <input class="form-control" type="text" name="telefone" disabled value="<?= $info['telefoneCliente']; ?>">
                    </label>
                    <label class="" for="empresaAtendida">Empresa Atendida:
                        <input class="form-control" type="text" name="empresaAtendida" disabled value="<?= $info['empresaAtendida']; ?>">
                    </label>
                    <label class="" for="atendente">Atendente:
                        <input class="form-control" type="text" name="atendente" disabled value="<?= $info['nomeAtendente']; ?>">
                    </label>
                    <label class="" for="clienteFezProcedimentos">Fez os procedimentos:
                        <input class="form-control" type="text" name="clienteFezProcedimentos" disabled value="<?= $info['clienteFezProcedimentos']; ?>">
                    </label>
                    <label class="" for="verificouCabos">Verificou os cabos:
                        <input class="form-control" type="text" name="verificouCabos" disabled value="<?= $info['verificouCabos']; ?>">
                    </label>
                    <label class="" for="verificouFinanceiro">Verificou financeiro:
                        <input class="form-control" type="text" name="verificouFinanceiro" disabled value="<?= $info['verificouFinanceiro']; ?>">
                    </label>
                    <label class="" for="los">Los:
                        <input class="form-control" type="text" name="los" disabled value="<?= $info['los']; ?>">
                    </label>
                    <label class="" for="tecTipos">Tecnologia:
                        <input class="form-control" type="text" name="tecTipos" disabled value="<?= $info['tecTipos']; ?>">
                    </label>
                    <label class="" for="ONUstats">ONU status:
                        <input class="form-control" type="text" name="ONUstats" disabled value="<?= $info['ONUstats']; ?>">
                    </label>
                    <label class="" for="sinalONU">Sinal ONU:
                        <input class="form-control" type="text" name="sinalONU" disabled value="<?= $info['sinalONU']; ?>">
                    </label>
                    <label class="" for="donwloadTesteVel">Teste Down:
                        <input class="form-control" type="text" name="donwloadTesteVel" disabled value="<?= $info['donwloadTesteVel']; ?>">
                    </label>
                    <label class="" for="uploadTesteVel">Teste Up:
                        <input class="form-control" type="text" name="uploadTesteVel" disabled value="<?= $info['uploadTesteVel']; ?>">
                    </label>
                    <label class="" for="pingTesteVel">Teste Ping:
                        <input class="form-control" type="text" name="pingTesteVel" disabled value="<?= $info['pingTesteVel']; ?>">
                    </label>
                    <label class="" for="testeFeitoPor">Teste feito por:
                        <input class="form-control" type="text" name="testeFeitoPor" disabled value="<?= $info['testeFeitoPor']; ?>">
                    </label>
                    <label class="" for="quaisAparelhosProblema">Quais aparelhos:
                        <input class="form-control" type="text" name="quaisAparelhosProblema" disabled value="<?= $info['quaisAparelhosProblema']; ?>">
                    </label>
                    <label class="" for="desdeQuando">Desde quando:
                        <input class="form-control" type="text" name="desdeQuando" disabled value="<?= $info['desdeQuando']; ?>">
                    </label>
                    <label class="" for="wifiAparece">Wifi aparece:
                        <input class="form-control" type="text" name="wifiAparece" disabled value="<?= $info['wifiAparece']; ?>">
                    </label>
                    <label class="" for="novoNomeRede">Novo nome Rede:
                        <input class="form-control" type="text" name="novoNomeRede" disabled value="<?= $info['novoNomeRede']; ?>">
                    </label>
                    <label class="" for="novaSenha">Nova senha:
                        <input class="form-control" type="text" name="novaSenha" disabled value="<?= $info['novaSenha']; ?>">
                    </label>
                    <label class="" for="caboExternoOuInterno">Cabo arrebentado:
                        <input class="form-control" type="text" name="caboExternoOuInterno" disabled value="<?= $info['caboExternoOuInterno']; ?>">
                    </label>
                    <label class="" for="cienteTaxa">Ciente da taxa:
                        <input class="form-control" type="text" name="cienteTaxa" disabled value="<?= $info['cienteTaxa']; ?>">
                    </label>
                    <label class="" for="dataAtendimento">Data do atendimento:
                        <input class="form-control" type="text" name="dataAtendimento" disabled value="<?= $info['dataAtendimento']; ?>">
                    </label>

                </div>
                <div class="containerObs">
                    <label class="" for="obs">Observação:
                        <textarea class="form-control" name="obs" id="obs" rows="1" disabled>
                            <?= $info['obs']; ?>
                            </textarea>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP DEPENDENCES -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- BOOTSTRAP DEPENDENCES -->

    <!-- JQUERY DEPENDECES -->
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/jquery.mask.js"></script>
    <!-- JQUERY DEPENDECES -->

    <script>
        let inputs = document.querySelectorAll('input');
        inputs.forEach((e) => {
            if (e.value == '') {
                e.value = "-"
            }
        })
    </script>
    <!-- SCRIPT LOADING -->
    <script>
        var loader = document.querySelector(".loader-wrapper");

        window.addEventListener("load", () => {
            loader.style.opacity = 0;
            setTimeout(() => {
                loader.style.display = "none";
            }, 500);
        });
    </script>
    <!-- SCRIPT LOADING -->
</body>

</html>