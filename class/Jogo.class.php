<?php
    require_once "Conexao.class.php";

    class Jogo{

        private $id;
        private $nome;
        private $imagem;

        public function __construct($nome, $imagem){
            $this->setNome($nome);
            $this->setImagem($imagem);
        }

        public function inserir(){
            try{
                $conexao = Conexao::getInstance();
                
                $sql = "INSERT INTO jogo (nome, extensaoImagem) VALUES(:nome, :extImagem)";

                $comando = $conexao->prepare($sql);
                $comando->bindValue(":nome", $this->getNome());

                $extImagem = pathinfo($this->imagem->name, PATHINFO_EXTENSION);
                $comando->bindValue(":extImagem", $extImagem);

                $comando->execute();

                return $this->inserirImagem($extImagem);
            } catch(PDOException $e){
                return "Erro ao cadastrar jogo: ".$e->getMessage();
            }
        }

        public function inserirImagem($extensao){
            try{
                $conexao = Conexao::getInstance();

                $id = $conexao->lastInsertId();

                $dadosImagem = file_get_contents($this->getImagem()->tmp_name);

                $destino = "../img/".$id.".".$extensao;

                return file_put_contents($destino, $dadosImagem);
            } catch(PDOException $e){
                return "Erro ao inserir imagem: ".$e->getMessage();
            }
        }

        public static function listar(){
            try{
                $conexao = Conexao::getInstance();

                $sql = "SELECT * FROM jogo";

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

                $sql = "SELECT * FROM jogo WHERE id = :id";

                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id", $id);

                $comando->execute();

                return $comando->fetch();
            } catch(PDOException $e){
                return "Erro: ".$e->getMessage();
            }
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getImagem(){
            return $this->imagem;
        }

        public function setImagem($imagem){
            $this->imagem = $imagem;
        }

    }
?>