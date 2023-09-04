<?php

class Usuario
{

    protected $db;
    protected $table = "usuarios";

    //nao precisa difinir um new para o DBConexao por ele ser um metodo estatico
    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
    /**
     * busca registro unico
     * @param int $id
     * @return Usuario
     */
    public function buscar($id)
    {

    }
    /**
     * Listar todos os registros da tabela usuario
     */
    public function listar()
    {
        try{
            
            $sql = "SELECT FROM {$this->table}";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Erro Na Listagem:" .$e->getMessage();
        }
    }
    /** 
     *Cadastrar Usuario
     *@param int $id
     *@param array $dados
     *@return bool 
     */
    public function cadastrar($dados)
    {
        try {
            $sql = "INSERT INTO {$this->table} {nome,email,senha,perfil}
            VALUES(:nome, :email,:senha,:perfil)";
            $stmt = $this->db->prepare($sql);
        } catch (PDOException $e) {
            echo "Erro na preparação:" . $e->getMessage();
        }
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':senha', $dados['senha']);
        $stmt->bindParam(':perfil', $dados['perfil']);

        try {
            $stmt->execute();
            echo "Inserção bem-sucedida!";
        } catch (PDOException $e) {
            echo "Erro na inserção:" . $e->getMessage();
        }
    }
    /**
     * Editar Usuario
     * @param int $id
     * @param array $dados
     * @return bool
     */
    public function editar($id, $dados)
    {
        try {
            $sql = "UPDATE usuarios SET nome=:nome , email=:email, senha=:senha, perfil=:perfil WHERE id = :id";
            $stmt = $this->db->prepare($sql);
        } catch (PDOException $e) {
            echo "Erro na preparação da consula" . $e->getMessage();
        }
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':senha', $dados['senha']);
        $stmt->bindParam(':perfil', $dados['perfil']);
        try {
            $stmt->execute();
            echo "Seus Dados Foram Atualizados com Sucesso!";
        } catch (PDOException $e) {
            echo "Erro na inserção:" . $e->getMessage();
        }
    }
    //Excluir usuario
    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM usuarios WHERE id=:id";
            $stmt= $this->db->prepare($sql);

            $stmt->bindParam(':id',$id, PDO::PARAM_INT);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo "Erro na hora de deletar:" . $e->getMessage();
        }
    }
}
