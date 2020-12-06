<?php

$host = 'localhost';
$dbname = 'SchemaDB';
$username = 'project2_user';
$password = 'password123';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$pdo = new PDO($dsn,$username,$password);


$title = $_GET['title'];      
$stmt = $pdo->query("SELECT * FROM IssuesTable");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$flag = false;

foreach($results as $row) {
    if($row['title'] === $title) {
        $flag = true;
        $id = $row['id'];
        $descrip = $row['description'];
        $descriptype = $row['type'];
        $prior = $row['priority'];
        $status = $row['status'];
        $assignedTo = $row['assigned_to'];
        $createdBy = $row['created_by'];
        $createdDate = $row['created'];
        $updatedDate = $row['updated'];
        break;

    }
}

$stmt = $pdo->query("SELECT * FROM UsersTable WHERE id = '$assignedTo'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $row) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
}

$name = $firstname . " " . $lastname;


    $createdDate = date_create($createdDate);
    $createdDate = date_format($createdDate, "F j, Y \a\\t g:iA");

    $updatedDate = date_create($updatedDate);
    $updatedDate = date_format($updatedDate, "F j, Y \a\\t g:iA");

    $page = "<div id=\"body\">

    <div id=\"header\">

        <h1 id=\"page-title\">". $title ."</h1>
        <h3 id=\"page-issuenumber\">Issue #". $id ."</h3>

    </div>

    <div id=\"main\">

        <div id=\"one\">

            <p id=\"page-description\">". $descrip ."</p>

            <ul id=\"page-time\">
                <li id=\"created-time\">Issue created on ". $createdDate ." by ". $createdBy ."</li>
                <li id=\"updated-time\">Last updated on ". $updatedDate ."</li>
            </ul>

        </div>

        <div id=\"two\">
                <div id=\"page-details\">
                    <div id=\"assigned\">
                        <h3 class=\"nospace\">Assigned To:</h3>" . $name . "
                    </div>
                    <div id=\"type\">
                        <h3 class=\"nospace\">Type:</h3>" . $descriptype . "
                    </div>
                    <div id=\"priority\">
                        <h3 class=\"nospace\">Priority:</h3>" . $prior . "
                    </div>
                    <div id=\"status\">
                        <h3 class=\"nospace\">Status:</h3>" . $status . "
                    </div>
                </div>

            <div id=\"closed-button\">
                <button id=\"page-closed\">Mark as Closed</button>
            </div>

            <div id=\"inprogress-button\">
                <button id=\"page-inprogress\">Mark In Progress</button>
            </div>
        </div>
    </div>
    
</div>";

echo $page;




?>