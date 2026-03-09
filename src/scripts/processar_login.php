<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (empty($usuario)) $errors[] = 'Usuário é obrigatório';
    if (empty($senha)) $errors[] = 'Senha é obrigatória';

    if (empty($errors)) {
        // TODO: Validar credenciais no banco de dados
        // Exemplo fictício:
        $user = buscar_usuario_no_bd($usuario);
        if ($user && password_verify($senha, $user['senha_hash'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario'] = $user['name'];
            header('Location: pagina.php');
            exit;
        }
        
        $errors[] = 'Usuário ou senha inválidos';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: login.php');
        exit;
    }
}

function buscar_usuario_no_bd($usuario) {
    $usuarios = [
        'admin' => [
            'id' => 1,
            'name' => 'Administrador',
            'senha_hash' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // senha: password
        ],
        'teste' => [
            'id' => 2,
            'name' => 'Usuário Teste',
            'senha_hash' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // senha: password
        ]
    ];
    
    return $usuarios[$usuario] ?? null;
}