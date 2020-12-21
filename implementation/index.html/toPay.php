<?php     
    include 'databaseConnection.php';
    include 'navigation.php';
?>

<!-- * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.-->

<!DOCTYPE html>

<html>
    <head>
            <title>Tickify - To pay</title>
            <link rel="icon" href="../img/TickifyLogo.png" type="image/icon type">
            <meta charset="UTF-8">

    </head>
                
    <?php

        $eventCategory = $_POST["eventCategory"];
        $eventCategory = explode("%%%", $eventCategory);
        $eventCategory = implode(" ", $eventCategory);
        
        $ticketNr = $_POST["ticketNr"];
        $eventNumber = $_POST["eventNumber"];
        $ticketPrice = $_POST["ticketPrice"];
         
   ?>
        
        <input type="text" value=<?php echo $eventCategory?>>
        <input type="number" value=<?php echo $ticketNr?>>
        <input type="number" value=<?php echo $ticketPrice?>>


    

	
</html>
