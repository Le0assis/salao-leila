<?php

$pdo = new PDO("mysql:host=localhost", "root", "");

$sql = file_get_contents(__DIR__ . '/init.sql');

$pdo->exec($sql);

echo "Banco inicializado!";