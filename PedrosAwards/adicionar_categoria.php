
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