<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Jogo - The Pedro's Awards</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="hero">
            <h1>Cadastro de Jogo</h1>
        </section>
        
        <section class="content">
            <form action="produtor.php" method="post" enctype="multipart/form-data">
                <h3>Nome: <input type="text" name="nome" size="35" required></h3>
                <h3>Imagem: <input type="file" name="imagem" required></h3>
                <br>
                <button type="submit" name="acao" value="salvarJogo">Cadastrar</button>
            </form>
        </section>
    </main>
    
    
    <form>

    </form>
</body>
</html>