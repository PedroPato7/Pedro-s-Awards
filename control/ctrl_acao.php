<?php

    require_once __DIR__."/../vendor/autoload.php";
    use PhpAmqpLib\Connection\AMQPStreamConnection;

    require_once "../class/Jogo.class.php";
    require_once "../class/Categoria.class.php";
    require_once "../class/JogoCategoria.class.php";

    $conexao = new AMQPStreamConnection("localhost", 5672, "guest", "guest");
    $canal = $conexao->channel();

    $canal->queue_declare("filaControle", false, false, false, false);

    echo "[*] Esperando por dados. Para cancelar, pressione CTRL + C \n";

    $callback = function($dados){
        $dados = json_decode($dados->getBody());

        echo "[x] Dados recebidos \n";

        var_dump($dados);

        $acao = $dados->acao;

        if($acao == "salvarJogo"){
            $nome = $dados->nome;
            $imagem = $dados->imagem;

            $jogo = new Jogo($nome, $imagem);

            $jogo->inserir();
        } else if($acao == "salvarCategoria"){
            $nome = $dados->nome;

            $categoria = new Categoria($nome);

            $categoria->inserir();
        } else{
            $id_jogo = $dados->id_jogo;
            $id_categoria = $dados->id_categoria;

            $jogoCategoria = new JogoCategoria($id_jogo, $id_categoria);

            if($acao == "salvarJogoCategoria"){
                $jogoCategoria->inserir();
            } else{
                $jogoCategoria->votar();
            }
        }
    };

    $canal->basic_consume("filaControle", "", false, true, false, false, $callback);

    try{
        $canal->consume();
    } catch(\Throwable $exception){
        echo $exception->getMessage();
    }

    $canal->close();
    $conexao->close();

?>