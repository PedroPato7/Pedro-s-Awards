<?php
    require_once "class/Categoria.class.php";
    require_once "class/JogoCategoria.class.php";
    require_once "class/Jogo.class.php";

    $id_categoria = isset($_GET["categoria"]) ? $_GET["categoria"] : 0;
    $voto = isset($_GET["voto"]) ? $_GET["voto"] : false;

    $categoria = Categoria::procurarId($id_categoria);

    $jogosCategoria = JogoCategoria::listarPorCategoria($id_categoria);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pedro's Awards</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="hero">
            <h1>Votação - <?php echo htmlspecialchars($categoria["nome"]); ?></h1>
        </section>
        <section class="content">
            <?php if (empty($jogosCategoria)): ?>
                <p>Nenhum jogo foi adicionado a esta categoria.</p>
            <?php else: ?>
                <div class="grid">
                    <?php
                        $somaVotos = 0;

                        foreach($jogosCategoria as $jogoCategoria)
                            $somaVotos += $jogoCategoria["totalVotos"];

                        foreach ($jogosCategoria as $jogoCategoria){
                            $jogo = Jogo::procurarId($jogoCategoria["id_jogo"]);
                    ?>
                    <div class='card'>
                        <form action="produtor.php" method="POST">
                            <input type="hidden" name="id_jogo" value="<?php echo $jogo["id"]; ?>">
                            <input type="hidden" name="id_categoria" value="<?php echo $categoria["id"]; ?>">
                            <?php
                                echo "<img src='img/".$jogo["id"].".".$jogo["extensaoImagem"]."' height='280'>
                                <h3>".htmlspecialchars($jogo['nome'])."</h3>
                                <button type='submit' name='acao' value='votar'>Votar</button>";
                            ?>
                        </form>
                        <?php
                            if($voto == true){
                                $porcentagem = number_format(($jogoCategoria["totalVotos"] * 100) / $somaVotos, 2, ",", ".");

                                echo "<h3>Votos: ".$jogoCategoria["totalVotos"]." (".$porcentagem."%)</h3>";
                            }
                        ?>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>