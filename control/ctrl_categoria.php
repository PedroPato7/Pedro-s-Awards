<?php
    require_once "../class/Categoria.class.php";

    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";

    $categoria = new Categoria($nome);

    $categoria->inserir();

    header("location:../categorias.php");
?>