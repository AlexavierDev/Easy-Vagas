<?php
require_once '../actions/connectBD.php';
include '../includes/mensagem.php';
include '../actions/login.php';

// CONDIÇÃO PARA VERIFICAR QUAL HEADER ADD DE ACORDO COM NIVEL DE PERMISSAO DO USUARIO
if (isset($_SESSION['permissao'])) {

    if ($_SESSION['permissao'] === 'ADMIN') {
        include '../includes/headerAdmin.php';
    }

    if ($_SESSION['permissao'] === 'FUNCIONARIO') {
        include '../includes/header.php';
    }
}

//VERIFICAR SE USUARIO ESTA LOGADO PARA PODE ACESSAR A PAGINA
if (!isset($_SESSION['logado'])) {
    header('location:../index.php');
}


// CONDIÇÃO PARA VERIFICAR SE FOI PASSADA ALGUMA PARA PESQUISAR
if (isset($_GET['placa']) && !empty($_GET['placa'])) {
    $placa_pesquisada = $_GET['placa'];
// Query para selecionar os veículos que correspondem à placa pesquisada
    $sql = "SELECT * FROM veiculos WHERE placa = '$placa_pesquisada'";
} else if (isset($_GET['saida'])) { // VERIFICA SE FOI PASSADA ALGUM FILTRO PRA LISTAR OS VEICULOS
    $saida = $_GET['saida'];
    if ($saida == 'sairam') {
        // QUERY PARA SELECIONAR OS VEICULOS QUE TEM HORA DE SAIDA REGISTRADA
        $sql = "SELECT * FROM veiculos WHERE hora_saida IS NOT NULL";
    } else if ($saida == 'pendente') {
        // QUERY PARA SELECIONAR OS VEICULOS QUE NAO TEM HORA DE SAIDA REGISTRADA
        $sql = "SELECT * FROM veiculos WHERE hora_saida IS NULL";
    }
} else {
    $sql = "SELECT * FROM veiculos WHERE hora_saida IS NULL";

}

$resultado = mysqli_query($connectBD, $sql);
$baseUrl = '/Sistema-Park/';


?>


<!-- MODAL DE CONFIRMAÇÃO DE EXCLUSÃO  -->
<div class="modal fade" id="confirmarExclusaoModal" tabindex="-1" aria-labelledby="confirmarExclusaoModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmarExclusaoModalLabel">Confirmar Saida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
               <p> Tem certeza que deseja registar a Saida do Veiculo?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="#" id="btn-confirmar-exclusao" class="btn btn-danger">Registrar Saida</a>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT PARA EXECUÇÃO DO MODALS -->
<script>
    var confirmarExclusaoModal = new bootstrap.Modal(document.getElementById('confirmarExclusaoModal'));
    var btnConfirmarExclusao = document.getElementById('btn-confirmar-exclusao');

    confirmarExclusaoModal._element.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Botão que acionou o modal
        var id = button.getAttribute('data-id'); // ID do veículo a ser registrado a saída
        var href = '../actions/registrarSaida.php?id=' + id; // URL de redirecionamento com o ID

        btnConfirmarExclusao.setAttribute('href', href);

        $.ajax({
            url: '../actions/buscarCliente.php',
            method: 'POST',
            data: {id: id},
            dataType: 'json',
            success: function (dadosCliente) {

                var modalBody = confirmarExclusaoModal._element.querySelector('.modal-body');
                modalBody.innerHTML = '<p>' + dadosCliente.nome_proprietario + '</p>';
            },
        });
    });
</script>

<!-- BOTOES PARA SELECIONAR VEICULOS E FORM PESQUISA -->
<div class="container-fluid d-flex flex-wrap justify-content-center align-items-center p-3">
    <a class="btn btn-primary m-3" href="listarVeiculos.php?saida=sairam">Veículos que Já Saíram</a>
    <a class="btn btn-primary m-3" href="listarVeiculos.php?saida=pendente">Veículos com Saída Pendente</a>
    <form action="listarVeiculos.php" method="get">
        <div class="input-group">
            <input type="text" class="form-control" name="placa" placeholder="Placa EX: ABC1234" aria-label="Username"
                   aria-describedby="basic-addon1">
            <input class="btn" type="submit" value="Pesquisar">
        </div>
    </form>
</div>

<!-- TABELA PARA EXIBIÇÃO DOS VEICULOS -->
<div class="table-responsive-sm">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nome Propietario</th>
            <th scope="col">Categoria</th>
            <th scope="col">Modelo</th>
            <th scope="col">Placa</th>
            <th scope="col">Cor</th>
            <th scope="col">Horario de Entrada</th>
            <th scope="col">Horario de Saida</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        //LOOP PARA EXIBIÇÃO DOS VEICULOS
        if (mysqli_num_rows($resultado) > 0) {
            while ($veiculo = mysqli_fetch_assoc($resultado)) {

                ?>
                <tr>
                    <td scope="col"><?= $veiculo['nome_proprietario'] ?></td>
                    <td scope="col"><?= $veiculo['categoria'] ?></td>
                    <td scope="col"><?= $veiculo['modelo'] ?></td>
                    <td scope="col"><?= $veiculo['placa'] ?></td>
                    <td scope="col"><?= $veiculo['cor'] ?></td>
                    <td scope="col"><?= date('d/m/Y H:i', strtotime($veiculo['data_registro'])) ?></td>
                    <td scope="col">
                        <?php // SE RETORNAR VALOR PADRÃO DO BD PREENCHER COM 'PENDENTE'
                        if (date('d/m/Y H:i', strtotime($veiculo['hora_saida'])) == '01/01/1970 00:00') {
                            echo 'Pendente';
                        } else {
                            echo date('d/m/Y H:i', strtotime($veiculo['hora_saida']));
                        }
                        ?>
                    </td>
                    <?php if (!isset($_GET['placa']) && (!isset($_GET['saida']) || $_GET['saida'] !== 'sairam') || date('d/m/Y H:i', strtotime($veiculo['hora_saida'])) == '01/01/1970 00:00') { ?>
                        <td><a href="#" class="btn btn-danger" name="btn-excluir" data-bs-toggle="modal"
                               data-bs-target="#confirmarExclusaoModal" data-id="<?= $veiculo['id'] ?>">Registrar
                                Saída</a>
                        </td>
                    <?php } ?>
                </tr>
                <?php
            }
        } else {
            echo '<tr><td scope="col">Não há veiculos registrados</td></tr>';
        }

        ?>


        </tbody>
    </table>

</div>

