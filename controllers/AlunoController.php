<?php

require_once $_SERVER["DOCUMENT_ROOT"] ."/models/Aluno.php";
class AlunoController{
    private $alunoModel;

    public function __construct()
    {
        $this->alunoModel = New Aluno();
    }
    public function listarAlunos(){
        return $this->alunoModel->listar();
    }
    public function cadastrarAluno(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados = [
                'nome'=> $_POST['nome'],
                'cpf'=>$_POST['cpf'],
                'email'=>$_POST['email'],
                'telefone'=>$_POST['telefone'],
                'celular'=>$_POST['celular'],
                'data_nascimento'=>$_POST['data_nascimento']
            ];

            $this->alunoModel->cadastrar($dados);

            header('Location: index.php');
            exit;
        }
    }
    public function editarAluno(){
        $id_aluno = $_GET['id_aluno'];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id_aluno = $_GET['id_aluno'];

        }
    }
    public function excluirAluno(){
        $this->alunoModel->excluir($_GET['id_aluno']);
        header('Location: index.php');
        exit;
    }
}

