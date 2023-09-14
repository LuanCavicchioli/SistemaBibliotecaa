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
        $id_usuario = $_GET['id_usuario'];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id_usuario = $_GET['id_usuario'];
            if(isset($_POST['senha']) && !empty($_POST['senha'])){
                $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
                //Nova senha
            }else{
                //Senha antiga
                $usuario = $this->usuarioModel->buscar($id_usuario);
                $senha = $usuario->senha;
            }
            
            $dados = [
                'nome'=> $_POST['nome'],
                'email'=> $_POST['email'],
                'senha'=>$senha,  
                'perfil'=>$_POST['perfil']
            ];
            //var_dump($dados);

            $this->usuarioModel->editar($id_usuario,$dados);

            header('Location: index.php');
            exit;
            
        }
        return $this->usuarioModel->buscar($id_usuario);
    }
    public function excluirUsuario(){

        $this->usuarioModel->excluir($_GET['id_usuario']);
        header('Location: index.php');
        exit;
    }
}
