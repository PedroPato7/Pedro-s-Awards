<?php
    require_once "../class/Jogo.class.php";

    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $imagem = isset($_FILES["imagem"]) ? $_FILES["imagem"] : NULL;

    $jogo = new Jogo($nome, $imagem);

    $jogo->inserir();

    header("location:../nominados.php");
?>