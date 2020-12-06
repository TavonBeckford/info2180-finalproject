<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BugMe Issue Tracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="buglogger.js"></script>
</head>
<body>
    <div class= "wrapper">
        <header><img src="bugimg.svg" alt=""><h1>BugMe Issue Tracker</h1></header>
        <nav>
            <li><a id ="nhome" href="home.php"><i class= "fa fa-home fa-fw"></i>Home</a></li>
            <li><a id ="nadduser" href="adduser.php"><i class= "fa fa-user-plus fa-fw"></i>Add User</a></li>
            <li><a id ="newissue" href="newissue.php"><i class= "fa fa-plus-circle fa-fw"></i>New Issue</a></li>
            <li><a id ="nlogout" href="logout.php"><i class= "fa fa-sign-out fa-fw"></i>logout</a></li>
        </nav>
        <div id="inputWrapper">
            <?php include 'home.php';?>  
        </div>
    </div>
    <div id= "displaay"></div>
</body>
</html>