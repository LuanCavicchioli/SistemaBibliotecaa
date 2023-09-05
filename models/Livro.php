<?php
class Livro
{
    protected $db;
    protected $table = "livros";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
    /**
     * busca registro aluno
     * @param int $id
     * @return Livro|null
     */
    public function buscar($id)
    {
        try {
            $sql = ("SELECT * FROM {$this->table} WHERE id_livro = :id");
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar!" . $e->getMessage();
            return null;
        }
    }
    /**
     * Listar Registros Da Tabela
     */
    public function listar()
    {
        try {
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
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
            $sql = "INSERT INTO {$this->table}{titulo,autor,numero_pagina,preco,ano_publicacao,isbn}VALUES(:titulo,:autor,:numero_pagina,:preco,:ano_publicacao,:isbn)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':titulo', $dados['titulo']);
            $stmt->bindParam(':autor', $dados['autor']);
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
            $stmt->bindParam(':preco', $dados['preco']);
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
            $stmt->bindParam(':isbn', $dados['isbn']);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro na inserção" . $e->getMessage();
            return false;
        }
    }
    public function editar($id, $dados)
    {
        try{
            $sql = "UPDATE {$this->db} SET titulo=:titulo,autor=:autor,numero_pagina=:numero_pagina,preco=:preco,ano_publicacao=:ano_publicacao,isbn=:isbn WHERE id_livro = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':titulo',$dados['titulo']);
            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo "Erro Ao Editar:". $e->getMessage();
            return false;
        }
    }
    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id_livro=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro na hora de deletar:" . $e->getMessage();
        }
    }
}
