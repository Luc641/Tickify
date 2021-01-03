<!DOCTYPE html>
<?php include 'databaseConnection.php';?>
<html>
    <head>
		<title>My Events</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="myEvents.css">
		<meta>
	</head>
	<body>      <?php include 'navigation.php';?>
        
        <header>

            <?php
            
                $eventNumber = 4;
            
                
                $stmt = $conn->prepare("SELECT E_Name, EventCategory, Description, E_Location, E_Date "
                                        . "FROM events "
                                        . "WHERE EventNr = $eventNumber");
                
                $stmt->execute();

                
                $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                $event = $stmt->fetch();
                
                $eventName = $event[0];
                $eventCategory = $event[1];
                $description = $event[2];
                $eventLocation = $event[3];
                $eventTime = $event[4];
              
                
                
                echo "<p> $eventCategory </p>";
                echo "<h1> $eventName </h1>";
                
            ?>
            
	</header>
	
        <div style="padding-left:16px">
            <h2>My events</h2>
            <p>
        </div>
        <ul>
            <li><a href="#personalInformation">Personal information</a></li>
            <li><a class="active" href="#myEvents">My events</a></li>
            <li><a href="#cancelEvent">Cancel Event</a></li>
            <li><a href="#uploadEvent">Upload Event</a></li>
        </ul> 
        <div class="main">
            <h3>Name</h3>
            <p> <?php echo $eventName;?> </p>
            
        </div>
        <div class="mainsec">
            <h3>Date</h3>
            <p> <?php echo $eventDate;?> </p>
            
        </div>
		
	</body>
</html>