

/* DBS Connection */

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
            if($conn){
                echo "Connected to the <strong>$db</strong> database successfully!"; 

            }
        } catch (PDOException $e){ // report error message 
            echo $e->getMessage(); 
        }
        
?>

/* DBS SELECT data */

<?php //https://www.php.net/manual/es/pdostatement.setfetchmode.php
        
        //Define the statement that is going to be executed
        $stmt = $conn->prepare("SELECT C_Name, C_Mail FROM CUSTOMER");
        
        /* We can also use WHERE and ORDER BY
         * 
         * $stmt = $conn->prepare("SELECT C_Name, C_Mail FROM CUSTOMER WHERE Status = false");
         * 
         * $stmt = $conn->prepare("SELECT C_Name, C_Mail FROM CUSTOMER ORDER BY C_Mail");
         * 
         */
        
        //Execute the previous defined statement
        $stmt->execute();
        
        //
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
        
        while ($row = $stmt->fetch()) {
            echo $row[0] . " " . $row[1] . "<br />";
          }
          
?>

/* Create table */

<?php

    // create the table
        $sql = "CREATE TABLE IF NOT EXISTS testtable ( name varchar(200), address varchar(200) )";
        $createStatement = $db->query($sql)

?>

/* Insert Data */

<?php

        $sql = "INSERT INTO TICKET (ID, EventNumber, Price, TicketCategory, Order_Number) VALUES (121, 5, 22.0, 'd', null)";
        $conn->exec($sql);
        
        /* 
        $sql = "INSERT INTO TICKET (ID, EventNumber, Price, TicketCategory, Order_Number) "
            . "VALUES "
                . "(121, 5, 22.0, 'd', null)";
         */
        
        /* WAY to insert MULTIPLE data
         * 
         * // begin the transaction
         * $conn->beginTransaction();
         * 
         * // our SQL statements
         * $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')");
         * $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mary', 'Moe', 'mary@example.com')");
         * $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Julie', 'Dooley', 'julie@example.com')");
         * 
         * // commit the transaction
         * $conn->commit();
         * 
         * 
         * ALSO CHECK -> https://www.w3schools.com/php/php_mysql_prepared_statements.asp
         */

?>

/* Delete Data */

<?php

    $sql = "DELETE FROM TICKET WHERE ID=121";
    $conn->exec($sql);

?>

/* Update Data */

<?php

    $sql = "UPDATE TICKET SET price=22.5 WHERE id=120";
        
    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

?>
