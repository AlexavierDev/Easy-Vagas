<?php
require_once '../actions/connectBD.php';
include '../includes/mensagem.php';
include '../actions/login.php';
// CONDIÇÃO PARA VERIFICAR QUAL HEADER ADD DE ACORDO COOM NIVEL DE PERMISSAO DO USUARIO
if(isset($_SESSION['permissao'])){

    if($_SESSION['permissao'] === 'ADMIN')
    {
        include '../includes/headerAdmin.php';
    }

    if($_SESSION['permissao'] === 'FUNCIONARIO')
    {
        include '../includes/header.php';
    }
}
//VERIFICAR SE USUARIO ESTA LOGADO PARA PODE ACESSAR A PAGINA
if (!isset($_SESSION['logado'])){
    header('location:../index.php');
}
?>

    <div class="mt-5">

        <form id="formCadastroFuncionario" class="container" action="../actions/cadastrarFuncionario.php" method="post">
            <h1>Cadastrar Funcionario</h1>
            <div class="form-group">
                <label for="nomeFuncionario">Nome do Funcionario</label>
                <input type="text" class="form-control" id="nomeFuncionario" name="nomeFuncionario"
                       placeholder="Jose Ferraz" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="joseferraz@gmail.com"
                       onfocusout="validaEmail()"
                       required>
                <div class="invalid-feedback">
                    Por favor, insira um email válido.
                </div>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="************" required>
            </div>
            <div class="form-group">
                <label for="nivelPermissao">Nivel de Permissão</label>
                <select class="form-control" id="nivelPermissao" name="nivelPermissao" required>
                    <option value="">Selecione uma opção</option>
                    <option value="FUNCIONARIO">FUNCIONARIO</option>
                    <option value="ADMIN">ADMIN</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success " name="btn-cadastrar" id="btn-cadastrar" value="Cadastrar">
        </form>

    </div>

<?php include '../includes/footer.php' ?>