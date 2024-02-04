<?php

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
if (!isset($_SESSION['logado'])) {
    header('location:../index.php');
}

?>


    <div id="" class="p-3">

        <form id="formRegistro" class="container" action="../actions/registrar.php" method="post">
            <h1>Registrar Veiculo</h1>
            <div class="form-group">
                <label for="nomePropietario">Nome do proprietário</label>
                <input type="text" class="form-control" id="nomePropietario" name="nomePropietario"
                       placeholder="Jose Ferraz" oninput="this.value = this.value.toUpperCase()" required>
            </div>
            <div class="form-group">
                <label for="categoriaVeiculo">Categoria do Carro</label>
                <select class="form-control" id="categoriaVeiculo" name="categoriaVeiculo" required>
                    <option value="">Selecione uma opção</option>
                    <option value="CARRO">CARRO</option>
                    <option value="CAMINHAO">CAMINHÃO</option>
                    <option value="MOTO">MOTO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Hilux"
                       oninput="this.value = this.value.toUpperCase()" required>
            </div>
            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" placeholder="EX:IAC0949"
                       oninput="this.value = this.value.toUpperCase()" onfocusout="validarCampoPlaca()" required>
                <div class="invalid-feedback">
                    Por favor, insira uma placa válida no formato "LLL-NNNN".
                </div>
            </div>
            <div class="form-group">
                <label for="cor">Cor</label>
                <input type="text" class="form-control" id="cor" name="cor" placeholder="Preto"
                       oninput="this.value = this.value.toUpperCase()" required>
            </div>
            <input type="submit"  class="btn btn-success " name="btn-registrar" id="btn-registrar" value="Registar">
        </form>

    </div>

<?php
include '../includes/footer.php';
?>