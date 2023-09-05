<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

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
     * @return Usuario|null
     */
    public function buscar($id)
    {
        try {
            $sql = ("SELECT * FROM {$this->table} WHERE id_usuario = :id");
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
     * Listar todos os registros da tabela usuario
     */
    public function listar()
    {
        try {

            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->query($sql);
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro Na Listagem:" . $e->getMessage();
            return null;
        }
    }
    /** 
     *Cadastrar Usuario
     *@param int $id
     *@param array $dados
     *@return bool|null
     */
    public function cadastrar($dados)
    {
        try {
            $sql = "INSERT INTO {$this->table} {nome,email,senha,perfil}
            VALUES(:nome, :email,:senha,:perfil)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro Ao Cadastrar:" . $e->getMessage();
            return false;
        }
    }
    /**
     * Editar Usuario
     * @param int $id
     * @param array $dados
     * @return bool|null
     */
    public function editar($id, $dados)
    {
        try {
            $sql = "UPDATE {$this->table} SET nome=:nome , email=:email, senha=:senha, perfil=:perfil WHERE id_usuario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);
            $stmt->bindParam(':id',$id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro Ao Editar:" . $e->getMessage();
            return false;
        }
    }
    //Excluir usuario
    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id_usuario=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro na hora de deletar:" . $e->getMessage();
        }
    }
}
