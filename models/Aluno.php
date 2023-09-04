<?php

class Aluno{
    protected $db;
    protected $table = "alunos";

    public function __construct()
    {
     $this->db = DBConexao::getConexao();   
    }
    /**
     * busca registro aluno
     * @param int $id
     * @return Aluno
     */
    public function buscar($id){

    }
    /**
     * Listar Registros Da Tabela
     */
    public function listar()
    {
        try{
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Erro Na Listagem:". $e->getMessage();
        }
    }
    /**
     * 
     */
    public function cadastrar($dados)
    {
        try{
            $sql = "INSERT INTO {$this->table}{nome,
            cpf,email,telefone,celular,data_nascimento}
            VALUES(:nome,:cpf,:email,:telefone,
            :celular,:data_nascimento)";
            $stmt=$this->db->prepare($sql);
        }catch(PDOException $e){
            echo "Erro na preparação:". $e->getMessage();
        }
        $stmt->bindParam(':nome',$dados['nome']);
        $stmt->bindParam(':cpf',$dados['cpf']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':telefone',$dados['telefone']);
        $stmt->bindParam(':celular', $dados['celular']);
        $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);

        try{
            $stmt->execute();
            echo "Inserção bem-sucedida!";
        }catch(PDOException $e){
            echo "Erro na inserção:". $e->getMessage();
        }
    }
    public function editar($id,$dados)
    {
        try{
            $sql = "UPDATE alunos SET nome=:nome,
            cpf=:cpf,email=:email,telefone=:telefone,
            celulara=:celular,data_nascimento=:data_nascimento WHERE id_aluno = :id";
            $stmt = $this->db->prepare($sql);
        }catch(PDOException $e){
            echo "Erro na preparação da consulta". $e->getMessage();
        }
        $stmt->bindParam(':nome',$dados['nome']);
        $stmt->bindParam(':cpf',$dados['cpf']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':telefone',$dados['telefone']);
        $stmt->bindParam(':celular', $dados['celular']);
        $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
        try{
            $stmt->execute();
            echo "Seus Dados Foram Atualizados Com Sucesso!";
        }catch(PDOException $e){
            echo "Erro na inserção" . $e->getMessage();
        }
    }
    public function excluir($id){
        try{
            $sql = "DELETE FROM alunos WHERE id_aluno =:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Erro na hora de deletar:";
            $e->getMessage();
        }
    }
}

?>