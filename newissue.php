<?php

$host = 'localhost';
$dbname = 'SchemaDB';
$username = 'project2_user';
$password = 'password123';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$pdo = new PDO($dsn,$username,$password);

$stmt = $pdo->query("SELECT firstname,lastname FROM UsersTable");
$results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);


?>
<link rel="stylesheet" href="styles.css">
<body>
    <p>Create Issue</p>
    <label for="title">Title</label><br></br>
    <input type="text" name="title" id="title"><br></br>
    <label for="descrip">Description</label><br></br>
    <textarea type="text" name="descrip" id="descrip" cols="30" rows="10"></textarea><br></br>
    <label for="adminis">Assigned To</label><br></br>
    <select name = "adminis" id ="adminis">
        <?php 
        foreach($results as $row)
        {
            echo "<option value='".$row['firstname']."'>".$row['firstname']." ".$row['lastname']."</option>";
        }
        ?>
    </select><br></br>
    <label>Type</label><br></br>
    <select name="descriptype" id="descriptype">
        <option value="Bug">Bug</option>
        <option value="Proposal">Proposal</option>
        <option value="Task">Task</option>
    </select><br></br>
    <label>Priority</label><br></br>
    <select name="prior" id="prior">
        <option value="Major">Major</option>
        <option value="Minor">Minor</option>
        <option value="Critical">Critical</option>
    </select><br></br>
    <input type="submit" class="submit" id="upload" value="Submit">  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="buglogger.js"></script>
</body>
