<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resposta do formulário</title>
</head>

<body>
    <h2>variável POST inteira</h2>
    <pre><?php var_dump($_GET) ?></pre>

    <h2>informações recebidas:</h2>
    <ul>
        <li>nome: <?php echo $_GET['nome'] ?></li>
        <li>idade: <?php echo $_GET['idade'] ?></li>
    </ul>
</body>

</html>