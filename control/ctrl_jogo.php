<?php

    require_once __DIR__."/../vendor/autoload.php";
    use PhpAmqpLib\Connection\AMQPStreamConnection;

    require_once "../class/Jogo.class.php";
    
    $conexao = new AMQPStreamConnection("localhost", 5672, "guest", "guest");
    $canal = $conexao->channel();

    $canal->queue_declare("filaJogo", false, false, false, false);

    echo "[*] Esperando por dados. Para cancelar, pressione CTRL + C \n";

    $callback = function($dados){
        echo "[x] Dados recebidos \n";

        $dadosJogo = json_decode($dados->getBody());

        $nome = $dadosJogo->nome;
        $imagem = $dadosJogo->imagem;

        echo "Nome: ".$nome."\nImagem: ".var_dump($imagem)."\n";

        $jogo = new Jogo($nome, $imagem);

        var_dump($jogo->getImagem());

        echo $jogo->inserir();
    };

    $canal->basic_consume("filaJogo", "", false, true, false, false, $callback);

    try{
        $canal->consume();
    } catch(\Throwable $exception){
        echo $exception->getMessage();
    }

    $canal->close();
    $conexao->close();

?>