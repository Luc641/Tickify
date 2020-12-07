<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php include 'databaseConnection.php';?>

<html>
    <head>
        <title>Ticket window</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/ticket.css"><!-- link to stylesheet -->
    </head>
    
    <body>
        
        <header>
            
            <?php
            
                $eventName = $_POST["eventName"];
                $eventNumber = $_POST["eventNumber"];
                
                $eventName = explode('%%%', $eventName);
                $eventName = implode(' ', $eventName);
                
                //Get list of diferent categories and ticket price
                $stmt = $conn->prepare("SELECT distinct ticketcategory, avg(price) "
                                        . "FROM ticket "
                                        . "WHERE EventNumber = $eventNumber "
                                        . "GROUP BY ticketcategory "
                                        . "ORDER BY TicketCategory");

                //Execute the previous defined statement
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_BOTH);
                
                $categories = array();
                $prices = array();
                
                // Save every obtained data into an array - $categories 
                // Save tickets price with key => value array
                while ($row = $stmt->fetch()) {
                    array_push($categories, $row[0]);
                    $prices[$row[0]] = number_format($row[1], 2); // float number with 2 decimals
                }
                
                //Calculate number of different categories
                $numberOfCategories = sizeof($categories);
                
                //Get list of diferent categories and number of available tickets
                $stmt = $conn->prepare("SELECT distinct ticketcategory, count (distinct ID) "
                                        . "FROM ticket "
                                        . "WHERE EventNumber = $eventNumber and order_number is null "
                                        . "GROUP BY ticketcategory "
                                        . "ORDER BY TicketCategory");

                //Execute the previous defined statement
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_BOTH);
                
                $availableTickets = array();
                
                // Save every obtained data into an array - $categories 
                // Save tickets available with key => value array
                while ($row = $stmt->fetch()) {
                    $availableTickets[$row[0]] = $row[1];
                }
              
            ?>
            
            <img src="../img/badmintonEvent.jpg" alt="Event" >
            
            <?php echo "<h1>$eventName</h1>" ?>
            
	</header><!-- end of header -->
        
        <h1> Ticket categories </h1>
        
        <?php
        
        // loop for printing the code between the two php the desired times
        foreach ($categories as $category){
        ?>
        
        <div class="category">
            
            <?php echo "<h1>$category</h1>" ?>
            
            <div class="categoryDescription">
                
                <?php
                    
                    $ticketToBuy = 0;
                    
                    if (array_key_exists($category, $availableTickets)){
                        $ticketToBuy = $availableTickets[$category];
                    }
                
                    echo "<p>Category description $category - Price: $prices[$category] €</p>";
                    echo "<p>Available tickets: $ticketToBuy </p>";
                    
                    $allowedToBuy = $ticketToBuy; 
                    
                    if ($ticketToBuy > 10) {
                        $allowedToBuy = 10;
                    }
                ?>
                
            </div>
            
            <div class="ticketQuantity">
                
                <div class="centerBtn">
                    
                    <form action="test.php" method="POST">
                        <?php
                            echo '<input type="number" class="ticketNr" name="'.htmlspecialchars($category).'" placeholder="0" min="0" max="'.htmlspecialchars($allowedToBuy).'" >';
                        ?>
                        <input type="hidden" name="eventCategory" value=<?php echo $category;?>>
                        <input type="hidden" name="eventNumber" value=<?php echo $eventNumber;?>>
                        <input type="hidden" name="ticketPrice" value=<?php echo $prices[$category];?>>
                        <input type="submit" class="paymentBtn" value ="Go to Payment" >
                    </form>
                        
                </div>
                
            </div><!-- end of division -->
            
        </div><!-- end of division -->
        
        <?php } ?>
        
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
                <img src="../img/paymentOptionsA.png" alt="Payment options image"> 
                
            </div><!-- end of division -->
            
        </footer><!-- end of footer -->
        
    </body>

</html>

