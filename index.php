<?php

    try{
    $pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost", "root", "kodejifr");
    } catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
    }


?>