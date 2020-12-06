<?php
session_start();

if(($_POST['title']!="")){
    $host = 'localhost';
    $dbname = 'SchemaDB';
    $username = 'project2_user';
    $password = 'password123';
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    $pdo = new PDO($dsn,$username,$password);

    date_default_timezone_set('Jamaica');
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descrip = filter_var($_POST['descrip'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $adminis = $_POST['adminis'];
    $descriptype = $_POST['descriptype'];
    $prior = $_POST['prior'];
    $status = 'OPEN';
    $date = date('Y-m-d H:i:s');
    $separ = explode(" ",($adminis));
    $firname = $separ[0];

    $email = $_SESSION['user'];

    $stm = $pdo->query("SELECT id FROM UsersTable WHERE email = '$email'");
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row) {
        $creatorid = $row['id'];
    }

    $createdBy = $creatorid;

    $stmt = $pdo->query("SELECT id FROM UsersTable WHERE firstname='$firname'");
    $results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);

    foreach($results as $result){
    $ID = $result['id'];
    }
    $insertData = "INSERT INTO IssuesTable (title,description,type,priority,status,assigned_to,created_by,created,updated)
    VALUES ('$title','$descrip','$descriptype','$prior','$status','$ID','$createdBy','$date','$date')";

    $stmt = $pdo->query($insertData);



}
?>