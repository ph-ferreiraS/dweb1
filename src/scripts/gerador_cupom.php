<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerador de Cupom</title>
</head>
<body>

    <h2>Gerador de Cupom de Desconto</h2>

    <!-- Formulário -->
    <form action="gerador_cupom.php" method="POST">
        <label for="nome">Seu nome:</label>
        <input type="text" id="nome" name="nome">
        <br><br>
        <label for="ano_nascimento">Ano de nascimento (4 dígitos):</label>
        <input type="text" id="ano_nascimento" name="ano_nascimento" maxlength="4">
        <br><br>
        <button type="submit">Gerar Cupom</button>
    </form>

    <br>

    <?php
    // Só executa quando o formulário for enviado via POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // 1. Recebe os dados do formulário
        $nome = trim($_POST["nome"]);
        $ano  = trim($_POST["ano_nascimento"]);

        // 2. Validações
        $erros = [];

        if (empty($nome)) {
            $erros[] = "O nome não pode estar vazio.";
        }

        // Verifica se o ano tem exatamente 4 dígitos numéricos
        if (!preg_match('/^\d{4}$/', $ano)) {
            $erros[] = "O ano de nascimento deve conter exatamente 4 dígitos numéricos.";
        }

        if (!empty($erros)) {
            // 5. Exibe mensagens de erro
            foreach ($erros as $erro) {
                echo "<p style='color: red;'><strong>Erro:</strong> $erro</p>";
            }
        } else {
            // 3. Gera o cupom
            $nomeUpper  = strtoupper($nome);           // Ex: "MARIA"
            $ultimos2   = substr($ano, -2);             // Ex: "98"
            $cupom      = $nomeUpper . $ultimos2;       // Ex: "MARIA98"

            // 4. Exibe o resultado
            echo "<p style='color: green; font-size: 1.2em;'>";
            echo "Parabéns, <strong>$nome</strong>! Seu cupom de desconto é: <strong>$cupom</strong>";
            echo "</p>";
        }
    }
    ?>

</body>
</html>