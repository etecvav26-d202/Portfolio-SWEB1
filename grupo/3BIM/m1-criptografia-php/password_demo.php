<?php
$titulo = 'Hash de senhas — bcrypt e Argon2id';

$senha = 'MinhaSenh@123';
$senhaConferir = '';
$resultadoConferencia = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['senha'])) {
        $senha = $_POST['senha'];
    }
    if (isset($_POST['senha_conferir'])) {
        $senhaConferir = $_POST['senha_conferir'];
    }
}

$hashBcrypt = password_hash($senha, PASSWORD_BCRYPT);
$hashArgon2id = defined('PASSWORD_ARGON2ID')
    ? password_hash($senha, PASSWORD_ARGON2ID)
    : null;

// Se o usuário preencheu o campo de conferência, valida contra o hash bcrypt gerado.
if ($senhaConferir !== '') {
    $resultadoConferencia = password_verify($senhaConferir, $hashBcrypt);
}

require __DIR__ . 'includes/header.php';
?>

<h2>Hash de senhas com <code>password_hash()</code></h2>
<p>
    Esta é a API recomendada pelo próprio PHP para senhas. Ela já cuida do
    "salt" aleatório e do fator de custo automaticamente, então dois hashes
    da mesma senha nunca são iguais — mesmo assim, ambos validam com
    <code>password_verify()</code>.
</p>

<form method="post" action="password_demo.php">
    <label for="senha">Senha para gerar o hash:</label>
    <input type="text" id="senha" name="senha" value="<?= htmlspecialchars($senha) ?>">

    <label for="senha_conferir">Testar <code>password_verify()</code> com esta senha:</label>
    <input type="text" id="senha_conferir" name="senha_conferir" value="<?= htmlspecialchars($senhaConferir) ?>" placeholder="Digite a mesma senha (ou outra) para testar">

    <button type="submit">Gerar / conferir</button>
</form>

<div class="resultado">
    <table>
        <tbody>
            <tr>
                <th>Hash BCRYPT</th>
                <td><code><?= htmlspecialchars($hashBcrypt) ?></code></td>
            </tr>
            <?php if ($hashArgon2id): ?>
            <tr>
                <th>Hash ARGON2ID</th>
                <td><code><?= htmlspecialchars($hashArgon2id) ?></code></td>
            </tr>
            <?php else: ?>
            <tr>
                <th>ARGON2ID</th>
                <td>Não disponível nesta instalação (requer PHP compilado com libargon2).</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>