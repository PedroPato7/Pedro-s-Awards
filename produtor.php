<?php

    require_once __DIR__ . '/vendor/autoload.php';
    use PhpAmqpLib\Connection\AMQPStreamConnection;
    use PhpAmqpLib\Message\AMQPMessage;

    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $imagem = isset($_FILES["imagem"]) ? $_FILES["imagem"] : NULL;

    $imagem = json_encode($imagem);

    $json = '{"nome":"'.$nome.'", "imagem": '.$imagem.'}';

    $conexao = new AMQPStreamConnection("localhost", 5672, "guest", "guest");
    $canal = $conexao->channel();

    $canal->queue_declare("filaJogo", false, false, false, false);

    $dadosJogo = new AMQPMessage($json);
    $canal->basic_publish($dadosJogo, "", "filaJogo");

    $canal->close();
    $conexao->close();

    header("location:nominados.php");
?>