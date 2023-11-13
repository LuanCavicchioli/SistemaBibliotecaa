<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecario.php";
    require_once $_SERVER['DOCUMENT_ROOT'] ."/controllers/AlunoController.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Aluno.php";

    if(isset($_GET["del"]) && !empty($_GET['id_aluno'])){
        $alunoController = new AlunoController();
        $alunoController->excluirAluno();
    }
?>

<main class="container mt-3 mb-3">
    <h1>Lista De Aluno
    <a href="cadastrar.php" class="btn btn-primary float-end">Cadastrar</a>
    </h1>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] ."/includes/alerta.php"?>
    <table class="table table-striped">
    <thead>
        <tr>
    

            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Data</th>
            <th style="width: 200px;">Ação</th>
        </tr>
    <tbody>
    </thead>
    
    <?php
        $alunosController = new AlunoController();
        $alunos = $alunosController->listarAlunos();
        foreach($alunos as $aluno):
        ?>
    <tr>
        <td><?=$aluno->id_aluno?></td>
        <td><?=$aluno->nome?></td>
        <td><?=$aluno->cpf?></td>
        <td><?=$aluno->email?></td>
        <td><?=$aluno->telefone?></td>
        <td><?=$aluno->celular?></td>
        <td><?=$aluno->data_nascimento?></td>
        <td>    
                        <a href="editar.php?id_aluno=<?=$aluno->id_aluno?>" class="btn btn-primary">Editar</a>
                        <a href="index.php?id_aluno=<?=$aluno->id_aluno?>&del" class="btn btn-danger">Excluir</a>
                    </td>
    </tr>
    <?php
        endforeach;
    ?>
        </tbody>
    </table>
</main>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>