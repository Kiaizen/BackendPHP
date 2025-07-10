<?php


function getDBConnection()
{
    $host = getenv("MYSQLHOST");
    $user = getenv("MYSQLUSER");
    $pass = getenv("MYSQLPASSWORD");
    $db   = getenv("MYSQLDATABASE");
    $port = getenv("MYSQLPORT");

    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo json_encode(['erro' => 'Erro na conexão: ' . $e->getMessage()]);
        exit();
    }
}
var_dump($host, $port, $db, $user, $pass);
exit();