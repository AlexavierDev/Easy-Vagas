<?php
//ADICIONA A CONEXÃO COM BANCO DE DADOS
require_once 'connectBD.php';

//FUNCAO PARA LIMPAR OS INPUTS ANTES DE INSERIR NO BD
function clearInput($input){
    global $connectBD;
    $inputClear = mysqli_escape_string($connectBD, $input);
    $inputClear = htmlspecialchars($inputClear);
    return $inputClear;
}


if(isset($_POST['btn-registrar'])){
    $nomePropietario = clearInput($_POST['nomePropietario']);
    $categoria = clearInput($_POST['categoriaVeiculo']);
    $modelo = clearInput($_POST['modelo']);
    $placa = clearInput($_POST['placa']);
    $cor = clearInput($_POST['cor']);

    //QUERY PARA INSERÇÃO DO DADOS NO BD
    $sql = "INSERT INTO veiculos (nome_proprietario, categoria, modelo, placa, cor) VALUES ('$nomePropietario', '$categoria','$modelo', '$placa', '$cor')";

    if (mysqli_query($connectBD, $sql)){
        header('location:../pages/listarVeiculos.php?sucesso=1');
    }else{
        header('../pages/listarVeiculos.php?sucesso=1');
    }


}




?>

