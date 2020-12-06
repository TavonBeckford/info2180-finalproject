<?php
if(($_POST['fname']!="")){
    $host = 'localhost';
    $dbname = 'SchemaDB';
    $username = 'project2_user';
    $password = 'password123';
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    $pdo = new PDO($dsn,$username,$password);

    date_default_timezone_set('Jamaica');
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];
    $hashpass = md5($pass);
    $eMail = $_POST['eMail'];
    $date = date('Y-m-d H:i:s');

    $insertData = "INSERT INTO UsersTable (firstname,lastname,password,email,date_joined)
    VALUES ('$fname','$lname','$hashpass','$eMail','$date')";

    $stmt = $pdo->query($insertData);
}

?>