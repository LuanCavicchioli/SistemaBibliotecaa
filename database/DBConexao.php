<?php

class DBConexao{
    //Configuração do banco de dados
    private $host = "localhost";
    private $dbname = "biblioteca";
    private $username= "root";
    private $password = "senac2023";

    public $conx;
    //Recebe null para iniciar a sessão
    private static $instance = null;

    public function __construct()
    {
        //Gerar conexão e se não entrar exibir erro
        try{
            //Inicializar a conexão
            $this->conx = new PDO("mysql:host=$this->host;
            dbname=$this->dbname;
            charset = utf-8",$this->username,$this->password);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            //Capturar o erro da conexão
            echo "Erro na conexão com o banco de dados :".$e->getMessage();
        }
    }
/** 
*Metodo estatico para obter a instancia unica da conexão(Implementação do Singleton)
*/
    public static function getConexao(){
        if(!self::$instance){
            self::$instance = new DBConexao();
        }
        return self::$instance->conx;
    }
}



?>