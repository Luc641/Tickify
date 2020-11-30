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
        <title>Event window</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="event.css"><!-- link to stylesheet -->
    </head>
    
    <body>
        
        <header>
            
            <p>Quick info of the event</p>
            
            <?php
            
                //Define the statement that is going to be executed
                $stmt = $conn->prepare("SELECT E_Name FROM events WHERE EventNr = 2");

                //Execute the previous defined statement
                $stmt->execute();

                //
                $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                $eventName = $stmt->fetch();
                
                $eventName = $eventName[0];
                
                echo "<h1> $eventName </h1>";
                
            ?>
            
	</header><!-- end of header -->
        
        <div id="eventDetails">
            
            <div id="eventGraph">
                
                <img src="./GitHub/prj1-2020-group-prj1-2020-15/implementation/images/badmintonEvent.jpg" alt="Event">
                
            </div><!<!-- end of division -->
            
            <div id="eventDescription">
                
                <h1>About the event</h1>
                
                <?php
                
                    //Define the statement that is going to be executed
                    $stmt = $conn->prepare("SELECT Description FROM events WHERE EventNr = 2");

                    //Execute the previous defined statement
                    $stmt->execute();

                    //
                    $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                    $description = $stmt->fetch();
                    
                    $description = $description[0];
                    
                    echo "<p> $description </p>";
                
                ?>
                
            </div><!-- end of division -->
            
        </div><!<!-- end of division -->
        
        <div class="eventTicket">
            
            <h1> Next events </h1>
            
            <div class="eventDate">
                
                <?php
                
                    $stmt = $conn->prepare("SELECT E_Date FROM events WHERE EventNr = 2");

                    //Execute the previous defined statement
                    $stmt->execute();

                    //
                    $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                    $eventTime = $stmt->fetch();
                
                    // Los delimitadores pueden ser barra, punto o guión
                    list($date, $time) = explode(' ', $eventTime[0]);
                    
                    list($year, $month, $day) = explode('-', $date);
                    list($hour, $minutes, $seconds) = explode(':', $time);
                    
                    echo "<p> $month </p>";
                    echo "<p> $day </p>";
                    echo "<p> $year </p>";
                
                ?>
                
            </div>
            
            <div class="eventLocation">
                
                <?php  ?>
                
                <?php
                
                    $stmt = $conn->prepare("SELECT E_Location FROM events WHERE EventNr = 2");

                    //Execute the previous defined statement
                    $stmt->execute();

                    //
                    $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                    $eventLocation = $stmt->fetch();
                    
                    $eventLocation = $eventLocation[0];
                    
                    echo "<p> $hour : $minutes </p>";
                    echo "<p> $eventLocation </p>";
                    echo "<p> $eventName </p>";
                
                ?>
                      
            </div>
            
            <div class="goToTickets">
                
                <button class="ticketbtn">Buy ticket</button>
                
            </div>
            
        </div><!<!-- end of division -->

        <footer>
            
            <div id="leftFooter">
                
               <h1>Contact</h1>

                <ul>
                    <li><p>+31 111 111 111 for ordering tickets</p></li>
                    <li><p>+31 222 222 222 for service</p></li>
                </ul> 
                
            </div><!-- end of division -->
            
            <div id="rightFooter">
                
               <h1>Payment options</h1>
                <img src="./images/paymentOptionsA.png" alt="Payment options image"> 
                
            </div><!-- end of division -->
            
        </footer><!-- end of footer -->
        
    </body>

</html>


