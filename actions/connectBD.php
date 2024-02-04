<?php

$nameserver = 'localhost';
$user = 'root';
$password = '';
$nameBD = 'parksystem';

$connectBD = mysqli_connect($nameserver, $user, $password, $nameBD);

if (!$connectBD) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}