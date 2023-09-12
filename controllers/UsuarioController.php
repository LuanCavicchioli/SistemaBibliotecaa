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

    public function cadastrarUsuario()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $dados = [
                'nome'=> $_POST['nome'],
                'email'=> $_POST['email'],
                'senha'=>password_hash($_POST['senha'],PASSWORD_DEFAULT),   
                'perfil'=>$_POST['perfil']
            ];
            //var_dump($dados);

            $this->usuarioModel->cadastrar($dados);

            header('Location: index.php');
            exit;
            
        }
    }
    public function editarUsuario()
    {
        $id = $_GET['id'];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $dados = [
                'nome'=> $_POST['nome'],
                'email'=> $_POST['email'],
                'senha'=>password_hash($_POST['senha'],PASSWORD_DEFAULT),   
                'perfil'=>$_POST['perfil']
            ];
            //var_dump($dados);

            $this->usuarioModel->editar($id,$dados);

            header('Location: index.php');
            exit;
            
        }
        return $this->usuarioModel->buscar($id);
    }
}
