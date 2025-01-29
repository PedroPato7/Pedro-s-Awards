<?php

    require_once __DIR__ . '/vendor/autoload.php';
    use PhpAmqpLib\Connection\AMQPStreamConnection;
    use PhpAmqpLib\Message\AMQPMessage;

    if(isset($_POST)){
        $chaves = array_keys($_POST);

        for($i = 0; $i < count($_POST); $i++){
            if($i == 0)
                $json = '{';

            $json .= '"'.$chaves[$i].'":"'.$_POST[$chaves[$i]].'"';

            if($i < count($_POST) - 1)
                $json .= ", ";
        }

        if(isset($_FILES["imagem"]))
            $json .= ', "imagem":'.json_encode($_FILES["imagem"]);

        $json .= '}';

        $conexao = new AMQPStreamConnection("localhost", 5672, "guest", "guest");
        $canal = $conexao->channel();

        $canal->queue_declare("filaControle", false, false, false, false);

        $dados = new AMQPMessage($json);
        $canal->basic_publish($dados, "", "filaControle");

        $canal->close();
        $conexao->close();
    }

    sleep(1);

    $acao = $_POST["acao"];

    if($acao == "salvarJogo")
    {
        header("location:nominados.php");
    }
    else if($acao == "salvarCategoria")
    {
        header("location:categorias.php");
    }
    else if($acao == "salvarJogoCategoria")
    {
        header("location:nominados.php");
    }
    else
        header("location:votacao.php?categoria=".$_POST["id_categoria"]."&voto=true");
?>