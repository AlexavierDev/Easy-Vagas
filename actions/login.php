<?php
session_start();
require_once 'connectBD.php';
include 'registrar.php';


if (isset($_POST['btn-login'])) {

    $email = clearInput($_POST['loginEmail']);
    $senha = clearInput($_POST['loginSenha']);
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($connectBD,$sql);

    if (mysqli_num_rows($resultado) > 0){
        //usuario ENCONTRADO
        $usuario = mysqli_fetch_assoc($resultado);
        $hash = $usuario['senha'];

        if (password_verify($senha,$hash)){
           //usuario verificado, senha CORRETA

            $_SESSION['permissao'] = $usuario['nivel_permissao'];
            $_SESSION['usuario'] = $usuario['nome'];
            $_SESSION['logado'] = true;
            header('location:../pages/listarVeiculos.php');
            exit();
        }else{
            //usuario nao verificado, senha INCORRETA
            header('location:../index.php?erro=4');
        }

    }else{
        //usuario nao encontrado
        header('location:../index.php?erro=5');
    }

}






