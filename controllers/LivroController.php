<?php
class LivroController{
    private $livroModel;

    public function __construct()
    {
        $this->livroModel = New Livro();
    }
}

