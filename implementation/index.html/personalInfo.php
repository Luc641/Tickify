<!DOCTYPE html>

<html>
    <head>
		<title>My profile</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="organizerAndConfirm.css">
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	<header>
	<div class="cont">
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
            
            $organizerMail = $_POST["Mail"] ;
            
                
            $stmt = $conn->prepare("SELECT , O_Mail, O_Password, O_Name, O_PhoneNr, O_Address FROM organizer WHERE O_Mail = $organizerMail";);
                
            $stmt->execute();

             
            $result = $stmt->setFetchMode(PDO::FETCH_NUM);

            $organizer = $stmt->fetch();
                
            $Mail = $organizer[0];
            $Password = $organizer[1];
            $Name = $organizer[2];
	        $Phone = $organizer[3];
            $Address = $organizer[4];    
            ?>
            
	</header>
	    <h2>Personal Information</h2>
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
        <div >
		    <form  action="personalInfo.php" method="post">
                <label class= "info" for="email"> <b> E-Mail: </b></label>
                <input class="p" type="text" placeholder="<?php echo $Mail;?>" name="email" id ="email" required>
                <br>
                <label class= "info" for="psw"> <b> Password: </b></label>
                <input class="p" type="password" placeholder="<?php echo $Password;?>" name="psw" id="psw" required>
			    <br>
			    <label class= "info" for="name"> <b> Name: </b></label>
                <input class="p" type="name" placeholder="<?php echo $Name;?>" name="name" id="name" required>
			    <br>
                <label class= "info" for="phone"> <b> Phone Number: </b></label>
                <input class="p" type="text" placeholder="<?php echo $Phone;?>" name="phone" id="phone" required>
                <br>
                <label class= "info" for="address"> <b> Address: </b></label>
                <input class="p" type="text" placeholder="<?php echo $Address;?>" name="address" id="address" required></p>
                <br>
                <button class="btn" type="submit" class="chanbut">save changes</button>
            </form>
	    </div>
		<?php if(isset($_POST['submit'])){
			      $Mail = $_POST['email'];    
			      $Password = $_POST['psw'];
			      $Name = $_POST['name'];
			      $Phone = $_POST['phone'];
			      $Address = $_POST['address'];
       
                  pg_query($conn,"INSERT INTO ORGANIZER VALUES($O_MAIL, $O_Password, $O_Name, $O_PhoneNr, $O_Address);");
                  echo 'Changes saved.';
          
                  pg_close($conn);
      
              }     
        ?>
		<?php include 'footer.php';?>
		</div>
		</div>
	</body>
</html>