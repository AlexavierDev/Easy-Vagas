<?php
include 'includes/mensagem.php';
$baseUrl = '/Sistema-Park/'

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon-easy-vagas.png" sizes="32x32">
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

    <title>Easy Vagas</title>
</head>


<body id="container" class="text-center container bg-light text-dark">
<form class="form-signin" action="actions/login.php" method="post">
    <img class="mb-4" src="img/easy-vagas-logotipo.png" alt="" height="300" width="300" >
    <h1 class="h3 mb-3 font-weight-normal">Easy Vagas | Faça Login</h1>
    <div class="form-group">
        <label for="loginEmail" class="sr-only">Email</label>
        <input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="jose@gmail.com">
    </div>
    <div class="form-group">
        <label for="loginSenha" class="sr-only">Password</label>
        <input type="password" class="form-control" id="loginSenha" name="loginSenha" placeholder="**********">
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-login">Login &rarr;</button>
    <p class="mt-5 mb-3 text-muted">Todos os direitos reservados &copy; 2023 | Easy Vagas</p>
</form>
</body>
</html>
