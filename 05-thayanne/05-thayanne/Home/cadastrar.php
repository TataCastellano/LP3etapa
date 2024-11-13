<?php
// Inicia a sessão
session_start();

// Inclui a conexão com o banco de dados
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Criptografar a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Verifica se o usuário já existe
    $sql = "SELECT * FROM usuarios WHERE login = '$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Usuário já existe!";
    } else {
        // Insere novo usuário
        $sql = "INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha_hash')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }
    }
}
?>

<form method="POST">
    Login: <input type="text" name="login" required><br>
    Senha: <input type="password" name="senha" required><br>
    <input type="submit" value="Cadastrar">
</form>
