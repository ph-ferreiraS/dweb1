<?php
$produtos = [
    ['id' => 1, 'nome' => 'Smartphone XYZ', 'categoria' => 'eletronicos', 'preco' => 1500],
    ['id' => 2, 'nome' => 'Camiseta Básica', 'categoria' => 'roupas', 'preco' => 50],
    ['id' => 3, 'nome' => 'Laptop Gamer', 'categoria' => 'eletronicos', 'preco' => 7000],
    ['id' => 4, 'nome' => 'Calça Jeans', 'categoria' => 'roupas', 'preco' => 120],
    ['id' => 5, 'nome' => 'Fone de Ouvido', 'categoria' => 'eletronicos', 'preco' => 300],
];

// Recebe a categoria do formulário
$categoria = isset($_POST['categoria']) ? trim($_POST['categoria']) : '';

// Filtra produtos pela categoria
$produtosFiltrados = array_filter($produtos, function($produto) use ($categoria) {
    return $produto['categoria'] === $categoria;
});

// Exibe resultados
if (empty($categoria) || empty($produtosFiltrados)) {
    echo "<p>Nenhum produto encontrado para esta categoria.</p>";
} else {
    echo "<ul>";
    foreach ($produtosFiltrados as $produto) {
        echo "<li>" . htmlspecialchars($produto['nome']) . " - R$ " . number_format($produto['preco'], 2, ',', '.') . "</li>";
    }
    echo "</ul>";
}
?>

<form action="buscar_produtos.php" method="POST">
    <label for="categoria">Buscar por Categoria:</label>
    <select id="categoria" name="categoria">
        <option value="">Selecione uma categoria</option>
        <option value="eletronicos">Eletrônicos</option>
        <option value="roupas">Roupas</option>
    </select>
    <button type="submit">Buscar</button>
</form>