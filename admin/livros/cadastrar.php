<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecario.php";

?>
<main class="container mt-3 mb-3">
    <h1>Cadastrar Livro</h1>
    <form action="cadastrar.php" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="numero_pagina" class="form-label">N°Pagina</label>
            <input type="text" name="numero_pagina" id="numero_pagina" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" name="preco" id="preco" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="ano_publicacao" class="form-label">A°Publicacao</label>
            <input type="text" name="ano_publicacao" id="ano_publicacao" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="ISBN" class="form-label">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>