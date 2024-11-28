<?php
session_start();
include 'database.php'; // Conexão ao banco de dados usando PDO

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário com os nomes corretos
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Prepara e executa a consulta com PDO
    $query = "SELECT * FROM Usuario WHERE email_Usuario = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se a senha e o email correspondem
    if ($usuario) {
        if ($senha !== $usuario['senha_Usuario']) {
            echo "Senha incorreta!";
        } else {
            $_SESSION['email_Usuario'] = $usuario['email_Usuario'];
            echo "Login feito com sucesso";
           // header("Location: /login.html?success=true");
        }
    } else {
        echo "Email não encontrado!";
    }
} else {
    header("Location: /login.html?error=true");
}
?>
