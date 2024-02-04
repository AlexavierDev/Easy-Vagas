<?php
$baseUrl = '/Sistema-Park/';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../img/favicon-easy-vagas.png" sizes="32x32">
    <link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="../js/validacoes.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <title>Gerenciamento de Estacionamento</title>
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="../pages/listarVeiculos.php">
        <img src="<?= $baseUrl ?>img/easy-vagas-logotipo.png" alt="" width="180" height="180">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link  " href="<?= $baseUrl ?>pages/registrarVeiculo.php">Registrar Veiculo</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link  " href="<?= $baseUrl ?>pages/listarVeiculos.php">Lista de Veiculos</a>
            </li>
        </ul>
    </div>
    <i class="far fa-user p-2 font-family-base" style="color: #000; font-size: 1.25rem; "><a
                style="font-family: Arial"> <?= $_SESSION['usuario'] ?></a> </i>
    <a href="../actions/logout.php"><i class="fas fa-sign-out-alt p-2" style="color: #000; font-size: 1.25rem"></i></a>
</nav>