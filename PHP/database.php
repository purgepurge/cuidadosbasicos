<?php 
$hostname = "localhost";
$username = "root";
$database = "CuidadosBasicos";
$password = "8973322";

try {
    
    $conn = new PDO("mysql:host =$hostname;dbname=$database",$username,$password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e){
    echo "erro na conexão: " . $e->getMessage();
}



?>