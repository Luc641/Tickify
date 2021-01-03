
<!DOCTYPE html>

<?php //from the Project slides

    // Declare DBS connection parameters
    $host = "prj1_postgres";
    $port = "5432";
    $db = "postgres";
    $user = "postgres";
    $pword = "mypassword";

    // Create Data Source Name (DSN) 
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pword";

    try{ // if the connection doesn’t work do not exit but go to catch part $conn = new PDO($dsn);

        // Connect to the defined PostgreSQL database & send connection message
        $conn = new PDO($dsn);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e){ // report error message 
        echo $e->getMessage(); 
    }
        
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="ManageUsers.css"/>
        <title>Tickify Admin Manage Users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <main>
             <div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="AdminProfile.php">My Profile</a>
</div> 
            
    <?php
            
    
    echo "<table class=\"Users\">";          
    echo "<tr><th>Email</th><th>Online/Offline</th><th>Deactivate</th></tr>";
    
    $stmt = $conn->prepare("SELECT c_mail, status FROM customer ORDER BY c_mail DESC");
    $stmt->execute();

    // set the resulting array to associative

    foreach ($stmt->fetchAll() as $row) {
        $fmt = ($row['status'] == 0) ? "Deactivated!" : "<a href=\"deactivateaccount.php?email=${row['c_mail']}\" > Deactivate </a>";
        $on = ($row["status"] == 1) ? "Online" : "Offline";
         echo <<<HTML
            <tr>
                <td>${row['c_mail']}</td>
                <td>${on}</td>
                <td>${fmt}</td>
            </tr>
        HTML;
    }

$conn = null;

echo "</table>";

?>
            
                 

        </main>
    </body>
</html>







