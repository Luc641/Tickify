<!DOCTYPE html>

<?php include 'databaseConnection.php';?>

<html>

    <head>

    <link rel="stylesheet" type="text/css" href="payment.css" media="screen" />

    <?php include 'navigation.php';?>

    </head>


        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <div> 
            
            <h1> Payment </h1>
            
            
            <hr>

            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="VISA") echo "checked";?> value="VISA">Visa
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="MAESTRO") echo "checked";?> value="MAESTRO">Maestro
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="MASTERCARD") echo "checked";?> value="MASTERCARD">MasterCard
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="AMERICAN EXPRESS") echo "checked";?> value="AMERICAN EXPRESS">American Express
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="PAYPAL") echo "checked";?> value="PAYPAL">PayPal
            <input type="radio" name="payment" <?php if (isset($payment) && $payment=="BANK TRANSFER") echo "checked";?> value="BANK TRANSFER">Bank Transfer            

            
            <label for="aname"> <b> Account Name: </b></label>
            <input type="text" placeholder="Enter your account name" name="aname" id="aname" required>
            
            <label for="anumb"> <b> Account Number: </b></label>
            <input type="number" placeholder="Enter your account number" name="anumb" id ="anumb" required>
            
            <label for="bname"> <b> Bank Name: </b></label>
            <input type="text" placeholder="Enter bank name" name="bname" id="bname" required>
            
            <label for="scode"> <b> Sort Code: </b></label>
            <input type="text" placeholder="Enter sort code" name="scode" id="scode" required>
            
            <label for="iban"> <b> IBAN </b></label>
            <input type="text" placeholder="Enter your IBAN" name="iban" id="iban" required>
            
            <label for="bic"> <b> BIC / Swift </b></label>
            <input type="text" placeholder="Enter bank name" name="bic" id="bic" required>
            
            <button type="submit" class="paymentbtn" formmethod="post"> Confirm </button>
            <button type="button" class="cancelbtn"> Cancel </button>
            
            
            </div>
            
        </form>

        <?php 

            if(isset($_POST['submit'])){

                $ANAME = $_POST['aname'];
                $ANUMB = $_POST['anumb'];
                $BNAME = $_POST['bname'];
                $SCODE = $_POST['scode'];
                $IBAN = $_POST['iban'];
                $BIC = $_POST['bic'];
            }
            
        ?>

        <div>
            
            <?php include 'footer.php';?>

        </div>


</html>
