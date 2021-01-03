
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

<html>
    <head>
        <link rel="stylesheet" href="Manage Payments.css"/>
        <title>Tickify Admin Manage Payments</title>
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
            
    
    echo "<table class=\"Payments\">";          
    echo "<tr><th>Order Number</th><th>Order Date</th><th>Payment Status</th><th>Customer Mail</th></tr>";
 
    $stmt = $conn->prepare("SELECT ordernumber, orderdate, paymentstatus,customermail FROM orders Order By orderdate DESC ");
    $stmt->execute();


foreach ($stmt->fetchAll() as $row) {
        $fmt = ($row['paymentstatus'] == 1) ? "Paid" : "<a href=\"Paymentpaid.php?ordernumber=${row['ordernumber']}\" > Not Paid </a>";
         echo <<<HTML
            <tr>
                <td>${row['ordernumber']}</td>
                <td>${row['orderdate']}</td>
                <td>${fmt}</td>
                <td>${row['customermail']}</td>
            </tr>
        HTML;
    }

$conn = null;
echo "</table>";
?>
                 

        </main>
    </body>
</html>




