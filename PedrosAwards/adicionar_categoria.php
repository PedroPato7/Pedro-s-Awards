<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novaCategoria = trim($_POST['categoria'] ?? '');

    if (!empty($novaCategoria)) {
        // Aqui você pode salvar a nova categoria em um banco de dados ou arquivo
        // Exemplo básico para adicionar em um arquivo JSON
        $arquivo = 'categorias.json';

        if (file_exists($arquivo)) {
            $categorias = json_decode(file_get_contents($arquivo), true);
        } else {
            $categorias = [];
        }

        $categorias[] = $novaCategoria;
        file_put_contents($arquivo, json_encode($categorias));

        // Atualiza as categorias exibidas
        echo "<script>alert('Categoria adicionada com sucesso! Atualizando categorias...'); window.location.href='index.php';</script>";
        exit;
    } else {
        $erro = "Por favor, insira um nome para a categoria.";
    }
}
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
    <div class="form-container">
        <h2>Adicionar Nova Categoria</h2>
        <?php if (!empty($erro)): ?>
            <p class="error"><?php echo htmlspecialchars($erro); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="categoria" placeholder="Nome da Categoria" required>
            <button type="submit">Adicionar</button>
        </form>
    </div>
</body>

</html>