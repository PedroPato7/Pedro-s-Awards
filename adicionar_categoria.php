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
            <h1>Cadastro de Categoria</h1>
        </section>
        
        <section class="content">
            <form method="POST" action="produtor.php">
                <h3>Nome: <input type="text" name="nome" size="35" required></h3>
                <br>
                <button type="submit" name="acao" value="salvarCategoria">Cadastrar</button>
            </form>
        </section>
    </main>
</body>
</html>