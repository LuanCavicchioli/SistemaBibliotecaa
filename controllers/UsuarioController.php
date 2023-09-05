<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

class UsuarioController{
    private $usuarioModel;
    public function __construct()
    {
        $this->usuarioModel = New Usuario();
    }

    public function listarUsuarios()
    {
        //vai puxar do model usuario o metodo listar
        return $this->usuarioModel->listar();
    }
}
