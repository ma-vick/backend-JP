<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resposta do formulário</title>
</head>

<body>
    <h2>variável POST inteira</h2>
    <pre><?php var_dump($_POST) ?></pre>

    <h2>informações recebidas:</h2>
    <ul>
        <li>nome: <?php echo $_POST['nome'] ?></li>
        <li>idade: <?php echo $_POST['idade'] ?></li>
        <li>cidade: <?php echo $_POST['cidade'] ?></li>
        <li>país: <?php echo $_POST['pais'] ?></li>
    </ul>

    <h2>enviando informações do formulário pro SQL</h2>
    <?php 
        try {
            // abrindo a conexão
            
            $conexao = new PDO("mysql:host=localhost;dbname=aula26_primeiro_db", "root", "");
            // host: endereço do ervidor
            // dbname: nome do banco de dados do servidor
            // segunda string: nome de usuário para entrar no servidor
            // terceira string: senha para entrar no servidor
        } catch {
            
        }
    ?>
</body>

</html>