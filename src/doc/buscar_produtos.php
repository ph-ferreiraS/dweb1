<?php

$produtos = [
    ['id' => 1, 'nome' => 'Smartphone XYZ', 'categoria' => 'eletronicos', 'preco' => 1500],
    ['id' => 2, 'nome' => 'Camiseta Básica', 'categoria' => 'roupas', 'preco' => 50],
    ['id' => 3, 'nome' => 'Notebook Gamer', 'categoria' => 'eletronicos', 'preco' => 7000],
    ['id' => 4, 'nome' => 'Calça Jeans', 'categoria' => 'roupas', 'preco' => 120],
    ['id' => 5, 'nome' => 'Fone de Ouvido', 'categoria' => 'eletronicos', 'preco' => 300],
];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Produtos</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .produto { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        h3 { margin-top: 0; }
        ul { list-style-type: none; padding: 0; }
    </style>
</head>
<body>

    <h1>Buscador de Produtos</h1>

    <form action="buscar_produtos.php" method="POST">
        <label for="categoria">Buscar por Categoria:</label>
        <select id="categoria" name="categoria">
            <option value="">Selecione uma categoria</option>
            <option value="eletronicos">Eletrônicos</option>
            <option value="roupas">Roupas</option>
            <option value="acessorios">Acessórios</option>
        </select>
        <button type="submit">Buscar</button>
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categoriaBuscada = $_POST['categoria'] ?? ''; 
   
        $produtosEncontrados = [];

        foreach ($produtos as $produto) {
            if ($produto['categoria'] === $categoriaBuscada) {
                $produtosEncontrados[] = $produto;
            }
        }

        echo '<h3>Resultados para a categoria: ' . htmlspecialchars($categoriaBuscada) . '</h3>';

        if (!empty($produtosEncontrados)) {
            echo '<ul>';
            foreach ($produtosEncontrados as $produto) {
                echo '<li>';
                echo '<div class="produto">';
                echo '<h3>' . htmlspecialchars($produto['nome']) . '</h3>';
                echo '<p>Preço: R$ ' . $produto['preco'] . '</p>';
                echo '</div>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>Nenhum produto encontrado para esta categoria.</p>';
        }
    }
    ?>

</body>
</html>