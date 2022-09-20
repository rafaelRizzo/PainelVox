<?php
$db_name = 'u756065205_short_colabs';
$db_host = '82.180.153.93';
$db_user = 'u756065205_root';
$db_password = 't3st3123A';

try {
    $pdo = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $db_user, $db_password);
} catch (PDOException $pe) {
    die("Não foi possível se conectar ao banco de dados $db_name :" . $pe->getMessage());
}
