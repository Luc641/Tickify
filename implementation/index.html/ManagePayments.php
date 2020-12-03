
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
        <link rel="stylesheet" href="Manage Payments.css"/>
        <title>Tickify Admin Manage Payments</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <main>
             <div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#AdminProfile">My Profile</a>
  <div class="search-container">
        <input type="text" placeholder="Search..">
  </div>
</div> 
<?php
            echo "<table style='border: solid 1px black;'>";
                echo "<tr><th>Order Number</th><th>Order Date</th><th>Payment Status</th><th>Customer Mail</th></tr>";
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 250px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}



    $stmt = $conn->prepare("SELECT OrderNumber, OrderDate, PaymentStatus,CustomerMail FROM ORDERS Order By OrderDate ");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }


$conn = null;
echo "</table>";
?>

        </main>
    </body>
</html>



