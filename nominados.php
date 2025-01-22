<?php
    require_once "class/Jogo.class.php";

    $jogos = Jogo::listar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nominados do Pedro's Awards</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="hero">
           <div class="votoNomies">
                <h3>
                    <a href="adicionar_jogo.php">Adicionar novo jogo</a> | <a href="adicionar_jogoCategoria.php">Adicionar Jogo à Categoria</a>
                </h3>
           </div>
        </section>

        <section class="content">
            <?php
                if(!empty($jogos)){
            ?>
            <div class="grid">
                <?php
                    foreach($jogos as $jogo){
                        echo "<div class='card'>
                            <img src='img/".$jogo["id"].".".$jogo["extensaoImagem"]."' height='280'>
                            <h3>(".$jogo["id"].") ".$jogo["nome"]."</h3>
                        </div>";
                    }
                ?>
            </div>
            <?php
                } else
                    echo "<br><p>Nenhum jogo foi encontrado.</p>";
            ?>
            <h2>Últimas Notícias</h2>
            <p>Esteja por dentro das novas nomeações, eventos e mais!</p>
        </section>
    </main>
</body>

</html>