<?php 
//from the Project slides

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
        
$email = $_GET["email"];
$stmt = $conn->prepare("update customer set status = false where c_mail = ? ");
$stmt->execute([$email]);

header("Location: ManageUsers.php");
die();
?>