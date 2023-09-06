<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
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
     * @return Aluno|null
     */
    public function buscar($id)
    {
        try {
            $sql = ("SELECT * FROM {$this->table} WHERE id_aluno = :id");
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
            $stmt = $this->db->query($sql);
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro Na Listagem:" . $e->getMessage();
            return null;
        }
    }
    /**
     * 
     */
    public function cadastrar($dados)
    {
        try {
            $sql = "INSERT INTO {$this->table} {nome,cpf,email,telefone,celular,data_nascimento}
            VALUES(:nome,:cpf, :email,:telefone,:celular,:data_nascimento)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':cpf', $dados['cpf']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':telefone', $dados['telefone']);
            $stmt->bindParam(':celular', $dados['celular']);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro Ao Cadastrar:" . $e->getMessage();
            return false;
        }
    }
    public function editar($id,$dados)
    {
        try {
            $sql = "UPDATE {$this->table} SET nome=:nome,cpf=:cpf, email=:email,telefone=:telefone, celularl=:celular,
            data_nascimento=:data_nascimento WHERE id_usuario = :id";
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