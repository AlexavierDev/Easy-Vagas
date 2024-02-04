<?php

require_once 'connectBD.php';


if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "UPDATE veiculos SET hora_saida = NOW() WHERE id = '$id'";
    $resultado = mysqli_query($connectBD,$sql);
    header('location:../pages/listarVeiculos.php?sucesso=2');
}




