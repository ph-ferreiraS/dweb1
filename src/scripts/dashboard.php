<?php
session_start();

// Check if session is active (for GET requests or page reload)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        header('Location: login.php?msg=Você precisa estar logado para acessar esta página.');
        exit();
    }
} else {
    // Handle POST request (login attempt)
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    if ($usuario === 'admin' && $senha === '123') {
        $_SESSION['logado'] = true;
        $mensagem = "Bem-vindo, Admin! Você está logado.";
    } else {
        header('Location: login.php?msg=Credenciais inválidas. Tente novamente.');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1><?php echo $mensagem ?? 'Dashboard'; ?></h1>
    <p>Você está logado como: <strong>Admin</strong></p>
    <a href="logout.php">Sair</a>
</body>
</html>