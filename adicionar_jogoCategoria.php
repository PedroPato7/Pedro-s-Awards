<?php
    require_once "class/Jogo.class.php";
    require_once "class/Categoria.class.php";

    $jogos = Jogo::listar();
    $categorias = Categoria::listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adição de Jogo à Categoria - The Pedro's Awards</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "header.php" ?>

    <main>
        <section class="hero">
            <h1>Adição de Jogo à Categoria</h1>
        </section>

        <section class="content">
            <form action="control/ctrl_jogoCategoria.php" method="post">
                <h3>
                    Jogo: 
                    <select name="id_jogo">
                        <option value="">Escolha um jogo</option>
                        <?php
                            foreach($jogos as $jogo)
                                echo "<option value='".$jogo["id"]."'>".$jogo["nome"]."</option>";
                        ?>
                    </select>
                </h3>
                <h3>
                    Categoria:
                    <select name="id_categoria">
                        <option value="">Escolha uma categoria</option>
                        <?php
                            foreach($categorias as $categoria)
                                echo "<option value='".$categoria["id"]."'>".$categoria["nome"]."</option>";
                        ?>
                    </select>
                </h3>
                <br>
                <button type="submit" name="acao" value="salvar">Adicionar</button>
            </form>
        </section>
    </main>
</body>
</html>