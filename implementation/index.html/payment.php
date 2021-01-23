<?php include 'navigation.php';?>
<?php include 'databaseConnection.php';?>

<!DOCTYPE html>

<html>

    <head>

    <link rel="stylesheet" type="text/css" href="../css/payment&register.css" media="screen" />

    <h1> Payment </h1>

    </head>


        <form method="post" action="confirmation.php">
        
        <div> 
        
            <p> To pay </p>
            
        <?php

            $eventCategory = $_POST["eventCategory"];
            $eventCategory = nameFormat($eventCategory);
            $eventName = nameFormat($_POST["eventName"]);

            $ticketNr = $_POST["ticketNr"];
            $eventNumber = $_POST["eventNumber"];
            $ticketPrice = $_POST["ticketPrice"];
 
        ?>
            <label>Name of the event</label>
            <input type="text" name="eventName" value="<?php echo $eventName;?>" readonly="true">
            
            <label>Name of the ticket's category</label>
            <input type="text" name="eventCategory" value="<?php echo $eventCategory;?>" readonly="true">
            
            <label>Numbers of tickets to buy</label>
            <input type="text" name="ticketNr" value="<?php echo $ticketNr;?>" readonly="true">
            
            <label>Total price</label>
            <input type="text" name="ticketPrice" value="<?php echo ($ticketPrice * $ticketNr) ."€";?>" readonly="true">

            <hr>
            <div>
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="VISA") echo "checked";?> value="VISA">Visa
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="MAESTRO") echo "checked";?> value="MAESTRO">Maestro
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="MASTERCARD") echo "checked";?> value="MASTERCARD">MasterCard
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="AMERICAN EXPRESS") echo "checked";?> value="AMERICAN EXPRESS">American Express
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="PAYPAL") echo "checked";?> value="PAYPAL">PayPal
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="BANK TRANSFER") echo "checked";?> value="BANK TRANSFER">Bank Transfer            
            </div>
            
            <div>
            <label for="aname"> <b> Account Name: </b></label>
            <input type="text" placeholder="Enter your account name" name="aname" id="aname" required>
            
            
            <label for="anumb"> <b> Account Number: </b></label>
            <input type="text" placeholder="Enter your account number" name="anumb" id ="anumb" required>
            
            <label for="bname"> <b> Bank Name: </b></label>
            <input type="text" placeholder="Enter bank name" name="bname" id="bname" required>
            
            <label for="scode"> <b> Sort Code: </b></label>
            <input type="text" placeholder="Enter sort code" name="scode" id="scode" required>
            
            <label for="iban"> <b> IBAN </b></label>
            <input type="text" placeholder="Enter your IBAN" name="iban" id="iban" required>
            
            <label for="bic"> <b> BIC / Swift </b></label>
            <input type="text" placeholder="Enter bank name" name="bic" id="bic" required>
            
            </div>

            <input type="hidden" name="eventCategory" value="<?php echo $eventCategory;?>" readonly="true">
            <input type="hidden" name="ticketNr" value="<?php echo $ticketNr;?>" readonly="true">
            <input type="hidden" name="eventNumber" value="<?php echo $eventNumber;?>" readonly="true">
        

            <button type="submit" class="paymentbtn" formmethod="post"> Confirm </button>
            <button type="button" class="cancelbtn"> Cancel </button>
            
            </div>
            
        </form>

    

        <div>
            
            <?php include 'footer.php';?>

        </div>


</html>

<?php

function nameFormat($name){
        
        $name = explode('%%%', $name);
        $name = implode(' ', $name);
        
        return $name;
    }
    
    function prepareToSend($string){
        
        $string = explode(' ', $string);
        $string = implode('%%%', $string);
        
        return $string;
    }
?>