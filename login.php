<?php
session_start();
$host = 'localhost';
$dbname = 'SchemaDB';
$username = 'project2_user';
$password = 'password123';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$pdo = new PDO($dsn,$username,$password);

if(isset($_POST)) {

    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->query("SELECT * FROM UsersTable");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($results as $row){
        if(($row['email'] === $email) && ($row['password'] === md5($password))) {
            $_SESSION['user'] = $email;
            echo "true";
            break;
        }
    }
  
}