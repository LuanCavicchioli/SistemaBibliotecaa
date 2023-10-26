<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecario.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AlunoController.php";

$alunoController = new alunoController();

$alunoController->cadastrarAluno();
?>
<main class="container mt-3 mb-3">
    <h1>Cadastrar Aluno</h1>

    <form action="cadastrar.php" method="post"class="row g-3">
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required  >
        </div>
        <div class="col-md-6">
            <label for="celular" class="form-control">Celular</label>
            <input type="text" name="celular"id="celular" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="data_nascimento" class="form-control">Nascimento</label>
            <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" required>
        </div>

    </form>
</main>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>  