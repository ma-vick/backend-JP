<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeiro php</title>
</head>

<body>
    <h1>Primeiro php</h1>
    <h2>Conteudo do proprio HTML</h2>
    <p>Paragrafo do proprio HTML</p>
    <?php
    echo "<h2>Conteúdo adicionado pelo php</h2>";
    ?>
    <p>O servidor <strong>executa</strong> o arquivo php para <strong>montar</strong> um HTML.</p>
    <p>O código php não aparece para o cliente </p>
    <p>o cliente recebe o HTML que foi montado.</p>
    <h2>valores, variáveis, operações</h2>
    <?php
    // Comentario de uma linha
    /* Comentario de varias linhas
    Os comentarios php nao aparecem para o cliente*/

    $a = 5; // Variáveis em php começa com $
    $abelhinha = 10;
    echo "<p> minha variável: $a</p>";
    //  voce pode pegar o valor de uma variável direto dentro da string, usado o $

    $a = 10 * 5;
    $a += 50;
    $a *= 2;
    $a++;

    echo "<p> minha variável com valor atualizado: $a</p>";

    $nome = 'Victória';
    $sobrenome = 'Almeida';

    echo "<p>nome completo: " . $nome . " " . $sobrenome . "</p>";
    ?>

    <h2>condicional</h2>
    <h3>if</h3>

    <?php
    if ($a > 200) {
        echo "<p>minha variável 'a' é maior que 200</p>";
    } else {
        echo "<p>minha variável não é maior que 200</p>";
    }

    $escolha = "tesoura";

    if ($escolha == "pedra") {
        echo "<p>pedra</p>";
    } elseif ($escolha == "papel") {
        echo "<p>papel</p>";
    } else {
        echo "<p>tesoura</p>";
    }

    // switch case

    switch ($escolha) {
        case "pedra":
            echo "<p>pedra</p>";
            break;
        case "papel":
            echo "<p>papel</p>";
            break;
        case "tesoura":
            echo "<p>tesoura</p>";
            break;
        default:
            echo "<p>insira um valor válido</p>";
            break;
    }
    ?>

    <h2>arrays</h2>

    <?php
    $lista = [10, 15, 40, 50];
    $alunos = ['Denis', 'Nicolas', 'Itaúnas', 'Matheus'];
    $alunos[0] = 'Dênis';
    $alunos[] = 'Kasuki';   // adiciona um novo valor à lista

    echo "<p>aluno na posição 0: $alunos[0]</p>";
    echo "<p>aluno na posição 4: $alunos[4]</p>";

    $alunosENotas = array(
        'Dênis' => 8.5,
        'Nicolas' => 7,
        'Itaúnas' => 10,
        'Matheus' => 6.5
    );

    $alunosENotas['Nicolas'] += 0.5;
    ?>

    <p>jeito rápido de imprimir um array inteiro</p>

    <?php
    echo "<pre>";
    var_dump($alunosENotas);
    echo "</pre>";
    ?>

    <h2>repetição</h2>
    <h3>for</h3>
    <p>números de 1 a 10</p>
    <ul>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<li>" . $i . "</li>";
        }
        ?>
    </ul>

    <p>números pares de 1 a 50</p>
    <ul>
        <?php
        for ($i = 2; $i <= 50; $i += 2) {
            echo "<li>" . $i . "</li>";
        }
        ?>
    </ul>

    <h2>usando foreach para varrer uma lista</h2>
    <p>lista de alunos:
        <?php
        // varrendo a lista $alunos, que é uma lista de índices
        foreach ($alunos as $elementoDaVez) {
            echo $elementoDaVez . ", ";
        }
        ?>
    </p>

    <p>lista de alunos e notas:</p>
    <ul>
        <?php
        // varrendo a lista $alunosENotas que é uma lista de chaves e valores
        foreach ($alunosENotas as $chave => $valor) {
            echo "<li>";
            echo $chave . ":" . $valor;
            echo "</li>";
        }
        ?>
    </ul>
    <p>lista de alunos e notas com situação:</p>
    <ul>
        <?php
        foreach ($alunosENotas as $chave => $valor) {
            echo "<li>";
            echo $chave . ": " . $valor;
            
            if($valor >= 7){
                echo " aprovado ";
            } elseif($valor > 6){
                echo " recuperação ";
            } else {
                echo " reprovado ";
            }
            echo "</li>";
        }
        ?>
    </ul>

    <h2>funções</h2>

    <?php 
        function imprimeComTag($texto, $tag="p"){
            echo "<$tag>$texto</$tag>";
        }

        imprimeComTag('aqui eu chamei a função', 'pre');
        imprimeComTag('aqui eu chamei a função');
        
        function situacao($nota){
            if($nota > 7){
                return " aprovado ";
            } elseif($nota >= 6){
                return " recuperação ";
            } else {
                return " reprovado ";
            }
        }

        echo situacao(8);

    ?>

    <!-- echo "<p></p>"; -->

</body>

</html>