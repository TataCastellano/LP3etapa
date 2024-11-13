<?php
// Inicia a sessão
session_start();

// Destroi a sessão e redireciona para a página de login
session_unset();
session_destroy();

header("Location: login.php");
exit();
?>
