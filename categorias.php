<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pedro's Awards</title>
    <link rel="stylesheet" href="css/style.css">
</head>


    <?php include 'header.php'; ?>

    <main>
    <div class="add-category">
                <button onclick="window.location.href='adicionar_categoria.php'">Adicionar Nova Categoria</button>
            </div>
        <section class="categories">
            <h2>Categorias</h2>
            <div class="grid">
                <?php 
                // Simulação de categorias
                $categories = [
                    'Melhor Jogo de Ação', 
                    'Melhor Jogo de Aventura', 
                    'Melhor Jogo de Esporte', 
                    'Melhor Jogo Indie',
                    'Melhor Direção de Arte'
                ];
                foreach ($categories as $index => $category) {
                    echo "<div class='card' onclick=\"window.location.href='votacao.php?categoria_id=" . ($index + 1) . "'\">";
                    echo "<h2>" . htmlspecialchars($category) . "</h2>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>
    </main>

</html>