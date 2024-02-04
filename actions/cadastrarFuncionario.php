<?php

require_once 'connectBD.php';

function clearInput($input){
    global $connectBD;
    $inputClear = mysqli_escape_string($connectBD, $input);
    $inputClear = htmlspecialchars($inputClear);
    return $inputClear;
}

if (isset($_POST['btn-cadastrar'])){
    $nome = clearInput($_POST['nomeFuncionario']);
    $email = clearInput(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $senha = clearInput($_POST['senha']);
    $nivelPermissao = clearInput($_POST['nivelPermissao']);
    $hashedSenha = password_hash($senha, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nome, email, senha, nivel_permissao) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connectBD, $sql);

    mysqli_stmt_bind_param($stmt, "ssss", $nome, $email,  $hashedSenha, $nivelPermissao);

    if (mysqli_stmt_execute($stmt)) {
        header('location:../pages/cadastrarFuncionario.php?sucesso=3');
    } else {
        header('location:../pages/cadastrarFuncionario.php?erro=3');
    }

    mysqli_stmt_close($stmt);


}