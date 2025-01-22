<?php
    require_once "class/Categoria.class.php";

    $categorias = Categoria::listar();
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
        <div class="add-category">
            <button onclick="window.location.href='adicionar_categoria.php'">Adicionar Nova Categoria</button>
        </div>
        <section class="categories">
            <h2>Categorias</h2>
            <?php
                if(!empty($categorias)){
            ?>
            <div class="grid">
                <?php 
                    foreach ($categorias as $categoria) {
                        echo "<div class='card' onclick=\"window.location.href='votacao.php?categoria=" .$categoria["id"]."'\">";
                        echo "<h2>" . htmlspecialchars($categoria["nome"]) . "</h2>";
                        echo "</div>";
                    }
                ?>
            </div>
            <?php
                } else
                    echo "<br><p>Nenhuma categoria foi encontrada.</p>";
            ?>
        </section>
    </main>
</body>
</html>