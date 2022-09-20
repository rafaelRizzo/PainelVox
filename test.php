<?php include "./db/config.php";

$lista = [];

$sql = $pdo->query("SELECT * FROM atendimentos_suporte");
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
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

        <div class="containerMain">
            <h2>Página de busca</h2>
            <form action="">
                <div class="formLeft border p-2 rounded">
                    <label for="setor">Setor
                        <select class="form-control" name="setor" id="setor">
                            <option selected disabled value="SELECIONE">Selecione...</option>

                            <option value="">Suporte</option>
                            <option value="">Financeiro</option>
                            <option value="">Comercial</option>
                        </select>
                    </label>
                    <label for="problema">Problema
                        <select class="form-control" name="problema" id="problema">
                            <option selected disabled value="SELECIONE">Selecione...</option>

                            <option value="SEM CONEXÃO">Sem Conexão</option>
                            <option value="OSCILAÇÃO">Oscilação</option>
                            <option value="LENTIDÃO">Lentidão</option>
                            <option value="MANUTENÇÃO">Manutenção</option>
                            <option value="CONFIGURAÇÃO">Configuração</option>
                            <option value="TROCA DE SENHA/E/OU NOME WIFI">Troca de senha/nome do wifi</option>
                            <option value="MUDANÇA DE COMODO">Mudança de cômodo</option>
                            <option value="CABO ARREBENTADO">Cabo arrrebentado</option>
                            <option value="TROCA DE CONECTOR">Trocar/refazer conector</option>
                            <option value="VENDA DE ROTEADOR">Venda de roteador</option>
                            <option value="OUTROS">Outros</option>
                        </select>
                    </label>

                    <label for="nomeCliente">Nome do cliente
                        <input class="form-control" type="text" name="nomeCliente" id="nomeCliente" placeholder="Digite o nome do cliente...">
                    </label>
                    <label for="cnpfCnpj">CPF/CNPJ
                        <input class="form-control" type="text" name="cnpfCnpj" id="cnpfCnpj" placeholder="Digite o CPF ou CNPJ...">
                    </label>
                    <label for="empresaName">Empresa
                        <input class="form-control" type="text" name="empresaName" id="empresaName" placeholder="Digite o nome da empresa...">
                    </label>
                    <label for="data">Data
                        <input class="form-control" type="date" name="data" id="data">
                    </label>
                </div>
                <div class="formRight">
                    <button class="btn btn-success">Buscar</button>
                </div>
            </form>

            <div class="containerSection">
                <h4>Listagem dos atendimentos</h4>
                <div class="table-responsive table-responsive-lg">
                    <table class="table table-striped table-sm-md table-bordered table-hover text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th class="docCliente">CPF/CNPJ</th>
                            <th class="ruaCliente">Rua</th>
                            <th class="numCasaCliente">Número da casa</th>
                            <th class="bairroCliente">Bairro</th>
                            <th class="cidadeCliente">Cidade</th>
                            <th>Telefone</th>
                            <th>Empresa Atendida</th>
                            <th>Nome Atendente</th>
                            <th>Problema</th>
                            <th>Data do atendimento</th>
                            <th>Ações</th>
                        </tr>
                        <?php foreach ($lista as $atd) : ?>
                            <tr>
                                <td> <?php echo $atd['id']; ?> </td>
                                <td> <?php echo $atd['nomeCliente']; ?> </td>
                                <td class="docCliente"> <?php echo $atd['cpfCnpjCliente']; ?> </td>
                                <td class="ruaCliente"> <?php echo $atd['ruaCliente']; ?> </td>
                                <td class="numCasaCliente"> <?php echo $atd['numeroCasaCliente']; ?> </td>
                                <td class="bairroCliente"> <?php echo $atd['bairroCliente']; ?> </td>
                                <td class="cidadeCliente"> <?php echo $atd['cidadeCliente']; ?> </td>
                                <td> <?php echo $atd['telefoneCliente']; ?> </td>
                                <td> <?php echo $atd['empresaAtendida']; ?> </td>
                                <td> <?php echo $atd['nomeAtendente']; ?> </td>
                                <td> <?php echo $atd['problemaCliente']; ?> </td>
                                <td> <?php echo $atd['dataAtendimento']; ?> </td>
                                <td>
                                    <abbr title="Ver mais informações">
                                        <a class="moreInfo" href="maisInformacoes.php?id=<?= $atd['id']; ?>">
                                            <img src="./eye.svg">
                                        </a>
                                    </abbr>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
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