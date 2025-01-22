<?php
    require_once "Conexao.class.php";

    class JogoCategoria{

        private $id_jogo;
        private $id_categoria;

        public function __construct($id_jogo, $id_categoria){
            $this->setIdJogo($id_jogo);
            $this->setIdCategoria($id_categoria);
        }

        public function inserir(){
            try{
                $conexao = Conexao::getInstance();

                $sql = "INSERT INTO jogo_categoria (id_jogo, id_categoria) VALUES(:id_jogo, :id_categoria)";

                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id_jogo", $this->getIdJogo());
                $comando->bindValue(":id_categoria", $this->getIdCategoria());

                $comando->execute();
            } catch(PDOException $e){
                echo "Erro ao adicionar jogo à categoria: ".$e->getMessage();
            }
        }

        public static function listarPorCategoria($id_categoria){
            try{
                $conexao = Conexao::getInstance();

                $sql = "SELECT * FROM jogo_categoria WHERE id_categoria = :id_categoria";

                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id_categoria", $id_categoria);

                $comando->execute();

                return $comando->fetchAll();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public function votar(){
            try{
                $conexao = Conexao::getInstance();

                $sql = "UPDATE jogo_categoria SET totalVotos = totalVotos + 1 
                        WHERE id_jogo = :id_jogo AND id_categoria = :id_categoria";

                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id_jogo", $this->getIdJogo());
                $comando->bindValue(":id_categoria", $this->getIdCategoria());

                $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public function getIdJogo(){
            return $this->id_jogo;
        }

        public function setIdJogo($id_jogo){
            $this->id_jogo = $id_jogo;
        }

        public function getIdCategoria(){
            return $this->id_categoria;
        }

        public function setIdCategoria($id_categoria){
            $this->id_categoria = $id_categoria;
        }

    }
?>