<?php     
    include 'databaseConnection.php';
    include 'navigation.php';
?>
<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Event window</title>
        <link rel="icon" href="../img/TickifyLogo.png" type="image/icon type">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/event.css"><!-- link to stylesheet -->
    </head>
    
    <body>

        <header>

            <?php
            
                $eventNumber = intval($_GET["eventNumber"]);
            
                $event = getEventInfo($eventNumber, $conn);
                
                list($eventName, $eventCategory, $description, $eventLocation, $eventTime, $filepath) = $event;
                
                $filepath = "../img/" . $filepath;

            ?>
            
            <p><?php echo $eventCategory; ?></p>
            <h1><?php echo $eventName; ?></h1>
            
	    </header><!-- end of header -->
        
        <div class="eventDetails">
            
            <section id="eventGraph">
                
                <img src="<?php echo $filepath; ?>" alt="Event">
                
            </section><!<!-- end of division -->
            
            <section id="eventDescription">
                
                <h1>About the event</h1>
                
                <p><?php echo $description; ?></p>
                
            </section><!-- end of division -->
            
        </div><!<!-- end of division -->
        
        <div class="eventTicket">
            
            <h1> Next events </h1>
            
            <section class="eventDate">
                
                <?php

                    list($date, $time) = explode(' ', $eventTime);
                    
                    list($year, $month, $day) = explode('-', $date);
                    list($hour, $minutes, $seconds) = explode(':', $time);
                    
                    $monthString = monthToString($month);
                
                ?>
                
                <p id="eventMonth"><?php echo $monthString; ?></p>
                <p><?php echo $day; ?></p>
                <p><?php echo $year; ?></p>
                
            </section>
            
            <section class="eventLocation">

                <p id="eventTime"><?php echo "$hour : $minutes"; ?></p>
                <p id="eventPlace"><?php echo $eventLocation; ?></p>
                <p><?php echo $eventName; ?></p>
                      
            </section>
            
            <div class="goToTickets">
                
                <form action="ticket.php" method="post">
                    
                    <?php $eventInfo = eventNameFormat($eventName); ?>
                    
                    <input name="eventNumber" type="hidden" value=<?php echo $eventNumber;?>>
                    <input name="eventName" type="hidden" value=<?php echo $eventInfo;?>>
                    <input name="eventPhoto" type="hidden" value=<?php echo $filepath;?>>
                    
                    <?php if((isset($_SESSION["user"])) and $_SESSION["userType"] == 0) { ?>
                    
                    <input type="submit" name="submit" value="Go to tickets" id="ticketbtn">
                    
                    <?php } else { ?>
                    
                    <textarea id="ticketAccess" name="ticketAccess" rows="2" cols="20" readonly="true">Log in as a customer to buy tickets</textarea>
                    
                    <?php } ?>
                        
                </form>

            </div>
            
        </div><!<!-- end of division -->

        <?php include 'footer.php';?>
        
    </body>

</html>

<?php

    function eventNameFormat($eventName){
        
        $eventInfo = explode(' ', $eventName);
        $eventInfo = implode('%%%', $eventInfo);
        
        return $eventInfo;
    }
    
    function getEventInfo($eventNumber, $conn){
        
        //Define the statement that is going to be executed
        $stmt = $conn->prepare("SELECT E_Name, EventCategory, Description, E_Location, E_Date, filePath "
                                . "FROM events "
                                . "WHERE EventNr = ?");
        //Execute the previous defined statement
        $stmt->execute([$eventNumber]);

        //Obtain the result as an array indexed by number of columns
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);

        //Obtain the results of the query (Only none or one row expected)
        $event = $stmt->fetch();
        
        return $event;
    }
    
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