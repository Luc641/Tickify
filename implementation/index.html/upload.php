<!DOCTYPE html>
<?php include 'databaseConnection.php';?>
<html>
	<head>
		<title>Upload Event</title>
		<link rel="stylesheet" type="text/css" href="upload.css">
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<header>
			<?php include 'navigation.php';
			$organizerMail = $_POST["Mail"] ;
	        INSERT INTO EVENT VALUES('$OrganizerMail'); ?>
	    </header>
		<h1>Upload your event here</h1><br>
		<form action="upload.php" method="post">
			<h3>Fill in the needed information about your event.</h3
			<br><br>
			<label>Fill in the name of the event:</label>
			<input class="pl" type="text" name="name" placeholder="Name of event"><br>
			<label>Select a category:</label>
			<select class="pl" name="category">
				<option value="1">Cinema & theatre</option>
                <option value="2">Concerts & festivals</option>
                <option value="3">Sports</option>
                <option value="4">Family</option>
                <option value="5">Expositions</option>
            </select><br>
			<label>Fill in some description for the event:</label>
            <input class="pl" type="text" name="description" placeholder="Describe your event here"><br>
            <label>Fill in the location of the event:</label>
            <input class="pl" type="text" name="location" placeholder="The location of your event"><br>
            <label>Fill in the date and the time of the event in the given format:</label>
            <input class="pl" type="text" name="date" placeholder="The date and time of your event in the format YYYY-MM-DD hh:mm:ss"><br>
            <label>Fill in the amount of available tickets for your event:</label>
            <input class="pl" type="number" name="tickets" value="0"><br>
            <input class="btn" type="submit" name="submit" value="Upload"> <br>
	    </form>
        <?php if(isset($_POST['submit'])){
			$name = $_POST['name'];    
			$category = $_POST['category'];
			$description = $_POST['description'];
			$location = $_POST['location'];
			$date = $_POST['date'];
			$availableTickets = $_POST['tickets']
       
            $_SESSION['availableTickets'] = $availableTickets;
          
		  
		    pg_query($connection,"INSERT INTO EVENT VALUES('$E_Name', '$EventCategory', '$Description', '$E_Location', '$E_Date' )");
              
          
            echo 'Mandatory information uploaded. <br>';
          
            pg_close($connection);
      
            }     
        ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
		    <p>Select file to upload:</p>
		    <input id="file" type="file" name="fileToUpload">
            <input class="btn" type="submit" value="Upload file" name="submit">
        </form>


        <?php
		    $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            $filepath = $target_file;
            pg_query($connection,"INSERT INTO EVENT VALUES('$filePath' )");
              
          
            echo 'File uploaded. <br>';
          
            pg_close($connection);
        ?>
        <br><br>
        <button class="btn"><a href="event.php">Submit</a></button>    <button class="btn"><a href="myProfile.php">Cancel</a></button>
    </body>
</html>
