<?php

require_once $_SERVER["DOCUMENT_ROOT"] ."/models/Livro.php";
class LivroController{
    private $livroModel;

    public function __construct()
    {
        $this->livroModel = New Livro();
    }
    public function listarLivors(){
        return $this->livroModel->listar();
    }
}

