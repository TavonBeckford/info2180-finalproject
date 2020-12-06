
<html>
<head>
<title>...</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="buglogger.js"></script>
</head>
<body>
</body>


<?php
session_start();
$host = 'localhost';
$dbname = 'SchemaDB';
$username = 'project2_user';
$password = 'password123';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$pdo = new PDO($dsn,$username,$password);

$email = $_SESSION['user'];

$stmt = $pdo->query("SELECT id FROM UsersTable WHERE email = '$email'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $row) {
    $id = $row['id'];
}

$creatorid = $id;

$stmt = $pdo->query("SELECT * FROM UsersTable WHERE id = '$creatorid'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $row) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
}

$name = $firstname . " " . $lastname;


$stmt = $pdo->query("SELECT * FROM IssuesTable WHERE assigned_to = '$creatorid'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


$tableheads="<div id = \"home-heading\">
                <h1 id = \"home-h1\"> Issues <h1>
                <button id = \"home-createNewIssueBtn\"> Create New issue </button>
            </div>
            <div> 
            <label>Filter by: </label>
            <button class = \"home-buttons\" id = \"home-allBtn\">ALL</button>
            <button class = \"home-buttons\" id = \"home-openBtn\"> OPEN </button>
            <button class = \"home-active\" id = \"home-myTicketsBtn\"> MY TICKETS </button> 
            </div>
            <div class = \"mytickets\" id='table'><table> 
                <th>Title</th>
                <th>Type</th> 
                <th>Status</th> 
                <th>Assigned To</th>
                <th>Created</th>";
                foreach($results as $row){
                    $date = explode(" ", $row['created'])[0];
                    $status = $row['status'];
                    if($status === "OPEN") {
                        $class = "OPEN";
                    } else if ($status === "CLOSED") {
                        $class = "CLOSED";
                    } else if ($status === "IN PROGRESS") {
                        $class = "IP";
                    }

                    $tableheads.= "<tr>". "
                                        <td>"."#".$row['id']." <a id='page' href='#'>".$row['title']."</a></td>".
                                        "<td>".$row['type']."</td>".
                                        "<td id = \"table-status\"> <div id = \"status-".$class."\">".$row['status']."</div> </td>".
                                        "<td>".$name."</td>".
                                        "<td>".$date."</td>".
                                    "</tr>";
                        }

$tableheads.="</table></div>";
echo $tableheads;




?>