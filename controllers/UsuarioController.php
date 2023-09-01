<?php
class UsuarioController{
    private $usuarioModel;
    public function __construct()
    {
        $this->usuarioModel = New Usuario();
    }
}