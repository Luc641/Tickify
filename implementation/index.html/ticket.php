<?php 
    include 'databaseConnection.php';
    include 'navigation.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Tickify - Ticket window</title>
        <link rel="icon" href="../img/TickifyLogo.png" type="image/icon type">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/ticket.css"><!-- link to stylesheet -->
    </head>
    
    <body>

        <header>
            
            <?php

                $eventName = eventNameFormat($_POST["eventName"]);
                $eventNumber = $_POST["eventNumber"];
                $filepath = $_POST["eventPhoto"];
                
                list($categories, $prices) = getTicketInfo($eventNumber, $conn);
                
                //Calculate number of different categories
                $numberOfCategories = sizeof($categories);
                
                $availableTickets = getAvailableTickets($eventNumber, $conn);
              
            ?>
            
            <img src="<?php echo $filepath; ?>" alt="Event" >
            
            <h1> <?php echo $eventName; ?> </h1>
            
	</header><!-- end of header -->
        
        <h1> Ticket categories </h1>
        
        <?php
        
        // loop for printing the code between the two php the desired times
        foreach ($categories as $category){
            
        ?>
        
        <article class="category">
            
            <h1> <?php echo $category; ?> </h1>
            
            <section class="categoryDescription">
                
                <?php
                    
                    $ticketToBuy = 0;
                    
                    if (array_key_exists($category, $availableTickets)){
                        $ticketToBuy = $availableTickets[$category];
                    }

                    $allowedToBuy = $ticketToBuy; 
                    
                    if ($ticketToBuy > 10) {
                        $allowedToBuy = 10;
                    }
                    
                    $categoryName = explode(" ", $category);
                    $categoryName = implode("%%%", $categoryName);
                ?>
                
                <p> <?php echo "Price: ". $prices[$category] . "€"; ?> </p>
                <p> <?php echo "Available tickets: ". $ticketToBuy; ?> </p>
                
            </section>
            
            <section class="ticketQuantity">
                
                <form action="toPay.php" method="POST">
                    <input type="hidden" name="eventCategory" value="<?php echo $categoryName;?>">
                    <input type="hidden" name="eventNumber" value="<?php echo $eventNumber;?>">
                    <input type="hidden" name="ticketPrice" value="<?php echo $prices[$category];?>">
                    <input type="number" id="ticketNr" name="ticketNr" placeholder="0" min="0" max="<?php echo $allowedToBuy; ?>" >
                    <input type="submit" id="paymentBtn" value ="Go to Payment" >
                </form>  
                
            </section><!-- end of division -->
            
        </article><!-- end of division -->
        
        <?php } ?>

        <?php include 'footer.php';?>
        
    </body>

</html>

<?php

    function eventNameFormat($name){
        
        $eventName = explode('%%%', $name);
        $eventName = implode(' ', $eventName);
        
        return $eventName;
    }
    
    function getTicketInfo($eventNumber, $conn){
        
        //Get list of diferent categories and ticket price
        $stmt = $conn->prepare("SELECT distinct ticketcategory, avg(price) "
                                . "FROM ticket "
                                . "WHERE EventNumber = ? "
                                . "GROUP BY ticketcategory "
                                . "ORDER BY TicketCategory");

        //Execute the previous defined statement
        $stmt->execute([$eventNumber]);

        /*Obtain the result as an array indexed by number of 
          columns or by attribute name*/
        $result = $stmt->setFetchMode(PDO::FETCH_BOTH);

        $categories = array();
        $prices = array();

        // Save every obtained data into an array - $categories 
        // Save tickets price with key => value array
        // while for treating more than one row from the query
        while ($row = $stmt->fetch()) {
            array_push($categories, $row[0]);
            // float number with 2 decimals
            $prices[$row[0]] = number_format($row[1], 2); 
        }
        
        $ticketInfo = array($categories, $prices);
        
        return $ticketInfo;
    }
    
    function getAvailableTickets($eventNumber, $conn){
        
        //Get list of diferent categories and number of available tickets
        $stmt = $conn->prepare("SELECT distinct ticketcategory, count (distinct ID) "
                                . "FROM ticket "
                                . "WHERE EventNumber = ? and order_number is null "
                                . "GROUP BY ticketcategory "
                                . "ORDER BY TicketCategory");

        //Execute the previous defined statement
        $stmt->execute([$eventNumber]);

        /* Obtain the result as an array indexed by number of 
           columns or by attribute name */
        $result = $stmt->setFetchMode(PDO::FETCH_BOTH);

        $availableTickets = array();

        // Save every obtained data into an array - $categories 
        // Save tickets available with key => value array
        // while for treating more than one row from the query
        while ($row = $stmt->fetch()) {
            $availableTickets[$row[0]] = $row[1];
        }
        
        return $availableTickets;
    }
?>

