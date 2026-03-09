<?php
session_start();

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tema'])) {
    $_SESSION['tema'] = $_POST['tema'];
    $mensagem = 'Preferência de tema salva com sucesso!';
}

$temaSelecionado = $_SESSION['tema'] ?? 'claro';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
</head>
<body>
    <h1>Configurações</h1>

    <?php if (!empty($mensagem)): ?>
        <p style="color: green;"><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <form method="POST" action="configuracoes.php">
        <label for="tema">Escolha o tema:</label>
        <select name="tema" id="tema">
            <option value="claro" <?= $temaSelecionado === 'claro' ? 'selected' : '' ?>>Claro</option>
            <option value="escuro" <?= $temaSelecionado === 'escuro' ? 'selected' : '' ?>>Escuro</option>
        </select>
        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="pagina.php">Voltar para a página principal</a>
</body>
</html>