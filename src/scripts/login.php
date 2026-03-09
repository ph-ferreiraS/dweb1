<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    <form action="processar_login.php" method="POST">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario">
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <br><br>
        <button type="submit">Entrar</button>
        <br><br>
        <a href="cadastro.php">Cadastre-se</a>
        <br><br>
         <a href="dashboard.php">Dashboard</a>
    </form>

</body>
</html>