<?php
session_start();

// Verificar se o tema está definido na sessão
if (isset($_SESSION['tema']) && $_SESSION['tema'] === 'escuro') {
    $estilo = 'background-color: #1a1a1a; color: #ffffff;';
} else {
    $estilo = 'background-color: #ffffff; color: #000000;';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página</title>
    <style>
        body {
            <?php echo $estilo; ?>
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
        }
        a {
            color: <?php echo (isset($_SESSION['tema']) && $_SESSION['tema'] === 'escuro') ? '#4da6ff' : '#0066cc'; ?>;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo à Página</h1>
    <p>Este é o conteúdo da sua página.</p>
    
    <br>
    <a href="configuracoes.php">← Voltar para Configurações</a>
</body>
</html>