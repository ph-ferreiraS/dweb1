<?php
session_start();

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($name)) $errors[] = 'Nome é obrigatório';
    if (empty($email)) $errors[] = 'Email é obrigatório';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email inválido';
    if (empty($password)) $errors[] = 'Senha é obrigatória';
    if ($password !== $confirm_password) $errors[] = 'Senhas não conferem';

    if (empty($errors)) {
        // TODO: Salvar usuário no banco de dados
        $_SESSION['success'] = 'Cadastro realizado com sucesso!';
        header('Location: login.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body { font-family: Arial; max-width: 500px; margin: 50px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .error { color: red; margin: 10px 0; }
        button { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Cadastro</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p>• <?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirmar Senha:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="login.php">Já tem cadastro? Faça login</a></p>
</body>
</html>