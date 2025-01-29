<?php
    require_once "Conexao.class.php";

    class Categoria{

        private $nome;

        public function __construct($nome){
            $this->setNome($nome);
        }

        public function inserir(){
            try{
                $conexao = Conexao::getInstance();

                $sql = "INSERT INTO categoria (nome) VALUES(:nome)";

                $comando =  $conexao->prepare($sql);
                $comando->bindValue(":nome", $this->getNome());

                $comando->execute();
            } catch(PDOException $e){
                return "Erro ao inserir categoria: ".$e->getMessage();
            }
        }

        public static function listar(){
            try{
                $conexao = Conexao::getInstance();

                $sql = "SELECT * FROM categoria";

                $comando = $conexao->prepare($sql);

                $comando->execute();

                return $comando->fetchAll();
            } catch(PDOException $e){
                return "Erro: ".$e->getMessage();
            }
        }

        public static function procurarId($id){
            try{
                $conexao = Conexao::getInstance();

                $sql = "SELECT * FROM categoria WHERE id = :id";

                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id", $id);

                $comando->execute();

                return $comando->fetch();
            } catch(PDOException $e){
                return "Erro: ".$e->getMessage();
            }
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

    }
?>