<!DOCTYPE html>
<?php include 'databaseConnection.php';?>
<html>
    <head>
		<title>My profile</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="personalInfoCss.css">
		<meta>
	</head>
	<body>
	<?php include 'navigation.php';?>
	 <header>

            <?php
            
                $organizerMail = $_POST["Mail"] ;
            
                
                $stmt = $conn->prepare("SELECT , O_Mail, O_Password, O_Name, O_PhoneNr, O_Address "
                                        . "FROM organizer "
                                        . "WHERE O_Mail = $organizerMail");
                //Execute the previous defined statement
                $stmt->execute();

                //
                $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                $organizer = $stmt->fetch();
                
                $Mail = $organizer[0];
                $Password = $organizer[1];
                $Name = $organizer[2];
				$Phone = $organizer[3];
                $Address = $organizer[4];
                
               
                
            ?>
            
	</header>
        <div style="padding-left:16px">
            <h2>Personal Information</h2>
            <p>
        </div>
        <ul>
            <li><a class="active" href="#personalInformation">Personal information</a></li>
            <li><a href="#myEvents">My events</a></li>
            <li><a href="#cancelEvent">Cancel Event</a></li>
        </ul> 
        <div class="main">
		<form  action="personalInfo.php" method="post">
            <label for="email"> <b> E-Mail: </b></label>
            <input type="text" placeholder="<?php echo $Mail;?>" name="email" id ="email" required>

            <label for="psw"> <b> Password: </b></label>
            <input type="password" placeholder="<?php echo $Password;?>" name="psw" id="psw" required>
			
			<label for="psw"> <b> Name: </b></label>
            <input type="name" placeholder="<?php echo $Name;?>" name="name" id="name" required>
			
            <label for="phone"> <b> Phone Number: </b></label>
            <input type="text" placeholder="<?php echo $Phone;?>" name="phone" id="phone" required>

            <label for="address"> <b> Address: </b></label>
            <input type="text" placeholder="<?php echo $Address;?>" name="address" id="address" required></p>
            
			
            <button type="submit" class="chanbut">save changes</button>
        </div></form>
		
		
		<?php if(isset($_POST['submit'])){
			$Mail = $_POST['email'];    
			$Password = $_POST['psw'];
			$Name = $_POST['name'];
			$Phone = $_POST['phone'];
			$Address = $_POST['address'];
       
          
          pg_query($connection,"INSERT INTO ORGANIZER VALUES('$O_MAIL', '$O_Password', '$O_Name', '$O_PhoneNr', '$O_Address' )");
              
          
          echo 'Changes saved. <br>';
          
          pg_close($connection);
      
    }     
  ?>
		<?php include 'footer.php';?>
		
	</body>
</html>