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
     * @return Livro
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
            $sql = "SELECT * FROM {$this->table}";
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
        try{
            $sql="INSERT INTO {$this->table}{titulo,autor,numero_pagina,preco,ano_publicacao,isbn}VALUES(:titulo,:autor,:numero_pagina,:preco,:ano_publicacao,:isbn)";
            $stmt = $this->db->prepare($sql);
        }catch(PDOException $e){
            echo "Erro na preparação". $e->getMessage();
        }
        $stmt->bindParam(':titulo',$dados['titulo']);
        $stmt->bindParam(':autor', $dados['autor']);
        $stmt->bindParam(':numero_pagina',$dados['numero_pagina']);
        $stmt->bindParam(':preco',$dados['preco']);
        $stmt->bindParam(':ano_publicacao',$dados['ano_publicacao']);
        $stmt->bindParam(':isbn', $dados['isbn']);

        try{
            $stmt->execute();
            echo "Inserção bem-sucedida!";
        }catch(PDOException $e){
            echo "Erro na inserção". $e->getMessage();
        }
    }
    public function editar($id, $dados)
    {
    }
    public function excluir($id)
    {
    }
}
