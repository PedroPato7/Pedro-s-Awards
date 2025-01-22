<?php
    require_once "../class/JogoCategoria.class.php";

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    $id_jogo = isset($_POST["id_jogo"]) ? $_POST["id_jogo"] : 0;
    $id_categoria = isset($_POST["id_categoria"]) ? $_POST["id_categoria"] : 0;

    $jogoCategoria = new JogoCategoria($id_jogo, $id_categoria);

    if($acao == "salvar"){
        $jogoCategoria->inserir();

        header("location:../nominados.php");
    } else{
        $jogoCategoria->votar();

        header("location:../votacao.php?categoria=".$id_categoria."&voto=true");
    }
?>