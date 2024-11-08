<?php

try{
    require "database.php";
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $nome = $_POST['nome_Usuario'];
        $email = $_POST['email_Usuario'];
        $password = $_POST['senha_Usuario'];
        $sexo = $_POST['sexo_Usuario'];

        $stmt = $conn -> prepare("INSERT INTO Usuario (nome_Usuario, email_Usuario, senha_Usuario, sexo_Usuario) VALUES (:nome, :email, :senha, :sexo)");

        $stmt -> bindParam(':nome',$nome);
        $stmt -> bindParam(':email',$email);
        $stmt -> bindParam(':senha',$password);
        $stmt -> bindParam(':sexo',$sexo);

        $stmt -> execute();
        header("Location: /register.html?success=true");
        exit();
    }
    
} catch (PDOException $e){
    header("Location: /register.html?error=true");
}

?>