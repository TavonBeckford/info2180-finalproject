<html>
<head>
<title>...</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="buglogger.js"></script>
</head>
<body>
</body>
<?php
   $host = 'localhost';
   $dbname = 'SchemaDB';
   $username = 'project2_user';
   $password = 'password123';
   $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

   $pdo = new PDO($dsn,$username,$password);

   $stmt = $pdo->query("SELECT i.id, i.title, i.status, i.type, i.created, u.firstname, u.lastname FROM issuestable AS i, userstable AS u WHERE i.assigned_to = u.id");
   $results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);



    $printTable="<div id = \"home-heading\">
                    <h1 id = \"home-h1\"> Issues <h1>
                    <button id = \"home-createNewIssueBtn\"> Create New Issue </button>
                </div>
                <div> 
                    <label>Filter by: </label>
                    <button class = \"home-active\" id = \"home-allBtn\">ALL</button>
                    <button class = \"home-buttons\" id = \"home-openBtn\"> OPEN </button>
                    <button class = \"home-buttons\" id = \"home-myTicketsBtn\"> MY TICKETS </button> 
                </div>
                <div id='table'><table> 
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

        $printTable.= "<tr>". "
                            <td>"."#".$row['id']." <a class='pagE' href='#'>".$row['title']."</a></td>".
                            "<td>".$row['type']."</td>".
                            "<td id = \"table-status\"> <div id = \"status-".$class."\">".$row['status']."</div> </td>".
                            "<td>". $row['firstname'].' '.$row['lastname']."</td>".
                            "<td>".$date."</td>".
                        "</tr>";
            }

    $printTable.="</table></div>";
    echo $printTable;

?>



