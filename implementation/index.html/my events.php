<!DOCTYPE html>

<html>
    <head>
		<title>My Events</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="organizerAndConfirm.css">
		<meta>
	</head>
	<body>    
        <div class="cont">	
        <header>
            <?php include 'navigation.php';?>
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
            
                $organizerMail = $_POST["Mail"];

                $stmt = $conn->prepare("SELECT E_Name, EventCategory, Description, E_Location, E_Date "
                                        . "FROM events "
                                        . "WHERE OrganizerMail = $organizerMail");
                
                $stmt->execute();

                
                $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                $event = $stmt->fetch();
                
                $eventName = $event[0];
                $eventCategory = $event[1];
                $description = $event[2];
                $eventLocation = $event[3];
                $eventTime = $event[4];
            ?>
            
	</header>
	    <h2>My events</h2>
        <div class="nav">
            
            
        
		<form action="personalInfo.php.php" method="post">
			
		
			<input class="btnm" type="submit" name="personalinfo" value="Personal information"><br>
			</form>
			<form action="my events.php" method="post">
            <input class="btnm" type="submit" name="myEvents" value="My events"> <br>
			</form>
			
			<form action="upload.php" method="post">
            <input class="btnm" type="submit" name="uploadEvent" value="Upload event"> <br>
	    </form>		
		</div>
		<div class="mainmain">
        <div class="maine">
            <h3>Name</h3>
            <p> <?php echo $eventName;?> </p>
            
        </div>
        <div class="mainsec">
            <h3>Date</h3>
            <p> <?php echo $eventDate;?> </p>
            
        </div>
		</div>
		</div>
	</body>
</html>