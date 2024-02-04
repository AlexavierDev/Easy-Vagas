<?php
//ADICIONA UMA MENSAGEM DE STATUS DA INSERÇÃO NO BANCO DE DADOS
if (isset($_GET['sucesso']) && $_GET['sucesso'] === '1') {
    echo '<div class="alert alert-success" role="alert">Veículo registrado com sucesso!</div>';
} else if (isset($_GET['erro']) && $_GET['erro'] == '1') {
    echo '<div class="alert alert-danger" role="alert">Erro ao Registrar, tente novamente!</div>';
}

//ADICIONA UMA MENSAGEM DE STATUS DE REGISTRO DO HORARIO DE SAIDA
if (isset($_GET['sucesso']) && $_GET['sucesso'] === '2') {
    echo '<div class="alert alert-success" role="alert">Saida registrada com sucesso!</div>';
} else if (isset($_GET['erro']) && $_GET['erro'] == '2') {
    echo '<div class="alert alert-danger" role="alert">Erro ao Registrar Saida, tente novamente!</div>';
}

//ADICIONA UMA MENSAGEM DE STATUS DE REGISTRO DO HORARIO DE SAIDA
if (isset($_GET['sucesso']) && $_GET['sucesso'] === '3') {
    echo '<div class="alert alert-success" role="alert">Funcionario cadastrado com sucesso!</div>';
} else if (isset($_GET['erro']) && $_GET['erro'] == '3') {
    echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar funcionario, tente novamente!</div>';
}

//ADICIONA UMA MENSAGEM DE STATUS DO LOGIN
if (isset($_GET['erro']) && $_GET['erro'] === '4') {
    echo '<div class="alert alert-success" role="alert">Erro ao realizar login, senha ou login incorretos</div>';
} else if (isset($_GET['erro']) && $_GET['erro'] == '5') {
    echo '<div class="alert alert-danger" role="alert">Erro ao realizar login, usuario não encontrado</div>';
}