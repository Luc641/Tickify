<!DOCTYPE html>

<?php include 'databaseConnection.php';?>

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

            <?php
            
                $eventNumber = 3;
            
                //Define the statement that is going to be executed
                $stmt = $conn->prepare("SELECT E_Name, EventCategory, Description, E_Location, E_Date, filePath "
                                        . "FROM events "
                                        . "WHERE EventNr = $eventNumber");

                //Execute the previous defined statement
                $stmt->execute();

                //
                $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                $event = $stmt->fetch();
                
                $eventName = $event[0];
                $eventCategory = $event[1];
                $description = $event[2];
                $eventLocation = $event[3];
                $eventTime = $event[4];
                $filePath = $event[5];
                
                
                echo "<p> $eventCategory </p>";
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

                    echo "<p> $description </p>";
                
                ?>
                
            </div><!-- end of division -->
            
        </div><!<!-- end of division -->
        
        <div class="eventTicket">
            
            <h1> Next events </h1>
            
            <div class="eventDate">
                
                <?php

                    list($date, $time) = explode(' ', $eventTime);
                    
                    list($year, $month, $day) = explode('-', $date);
                    list($hour, $minutes, $seconds) = explode(':', $time);
                    
                    $monthString = monthToString($month);
                    
                    echo "<span id='eventTime'> $monthString </span>";
                    echo "<span id='eventTime'> $day </span>";
                    echo "<span id='eventTime'> $year \n </span>";
                
                ?>
                
            </div>
            
            <div class="eventLocation">
                
                <?php
                
                    echo "<span id='eventInfo'> $hour : $minutes </span>";
                    //echo "<p> <font <strong> $eventLocation </strong> </p>";
                    echo "<span id='eventPlace'> $eventLocation </span>";
                    echo "<span id='eventInfo'> $eventName </span>";
                
                ?>
                      
            </div>
            
            <div class="goToTickets">
                
                <form action="ticket.php" method="post">
                    
                    <input type="number" name="eventNumber" value=<?php echo $eventNumber;?>>
                    <input type="text" name="eventName" value=<?php echo $eventName;?>>
                    <input type="submit" name="submit" value="Submit" class="ticketbtn">
                        
                </form>

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

<?php

    function monthToString($monthNumber){
        
        if ($monthNumber == "01"){
            return "January";
            
        } else if ($monthNumber == "02"){
            return "February";
            
        } else if ($monthNumber == "03"){
            return "March";
            
        } else if ($monthNumber == "04"){
            return "April";
            
        } else if ($monthNumber == "05"){
            return "May";
            
        } else if ($monthNumber == "06"){
            return "June";
            
        } else if ($monthNumber == "07"){
            return "July";
            
        } else if ($monthNumber == "08"){
            return "August";
            
        } else if ($monthNumber == "09"){
            return "September";
            
        } else if ($monthNumber == "10"){
            return "October";
            
        } else if ($monthNumber == "11"){
            return "November";
            
        } else if ($monthNumber == "12"){
            return "December";
            
        }
        
    }

?>


