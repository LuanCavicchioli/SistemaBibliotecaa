<?php

class Emprestimo
{
    protected $db;
    protected $table = "emprestimos";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
    /**
     * busca registro emprestimo
     * @param int $id
     * @return Emprestimo
     */
    public function buscar($id)
    {
    }
    /**
     * Listar Registros Da Tabela
     */
    public function listar()
    {
        try {

            $sql = "SELECT FROM {$this->table}";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro Na Listagem:" . $e->getMessage();
        }
    }
    /**
     * 
     */
    public function cadastrar($dados)
    {
        try {
            $sql = "INSERT INTO{$this->table} {id_livro,id_aluno,data_emprestimo,data_devolucao}VALUES(:id_livro,:id_aluno,:data_emprestimo,:data_devolucao)";
            $stmt = $this->db->prepare($sql);
        } catch (PDOException $e) {
            echo "Erro na preparação" . $e->getMessage();
        }
        $stmt->bindParam(':id_livro', $dados['id_livro']);
        $stmt->bindParam(':id_aluno', $dados['id_aluno']);
        $stmt->bindParam(':data_emprestimo', $dados['data_emprestimo']);
        $stmt->bindParam(':data_devolucao', $dados['data_devolucao']);

        try {
            $stmt->execute();
            echo "Inserção bem sucedida!";
        } catch (PDOException $e) {
            echo "Erro na inserção!" . $e->getMessage();
        }
    }
    public function editar($id, $dados)
    {
    }
    public function excluir($id)
    {
    }
}
