<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pedro's Awards</title>
    <link rel="stylesheet" href="css/style.css">
</head>

</html>

<?php
// votacao.php

// Simulando os jogos de uma categoria (pode ser do banco de dados)
$categorias = [
    1 => 'Melhor Jogo de Ação',
    2 => 'Melhor Jogo de Aventura',
    3 => 'Melhor Jogo de Esporte',
    4 => 'Melhor Jogo Indie',
];

// Captura o ID da categoria
$categoria_id = $_GET['categoria_id'] ?? null;

// Valida o ID da categoria
if (!isset($categorias[$categoria_id])) {
    die('Categoria inválida.');
}

// Jogos concorrendo (exemplo estático)
$jogos = [
    ['nome' => 'Jogo 1', 'categoria_id' => 1],
    ['nome' => 'Jogo 2', 'categoria_id' => 1],
    ['nome' => 'Jogo 3', 'categoria_id' => 2],
    ['nome' => 'Jogo 4', 'categoria_id' => 3],
];

// Filtrar jogos pela categoria
$jogos_categoria = array_filter($jogos, fn($jogo) => $jogo['categoria_id'] == $categoria_id);

include 'header.php';
?>

<main>
    <section class="voting">
        <h1>Votação - <?php echo htmlspecialchars($categorias[$categoria_id]); ?></h1>
        <?php if (empty($jogos_categoria)): ?>
            <p>Nenhum jogo nesta categoria ainda.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($jogos_categoria as $jogo): ?>
                    <li><?php echo htmlspecialchars($jogo['nome']); ?> <button>Vote</button></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
</main>