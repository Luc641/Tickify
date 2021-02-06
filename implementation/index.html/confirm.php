<!DOCTYPE html>
<?php include 'databaseConnection.php';?>
<html>
    <head>
		<title>Order confirmation</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="organizerAndConfirm.css">
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	    <header>
            <?php include 'navigation.php';?>
            <?php
            
                $orderNumber = $_POST["Order"];
            
                //Define the statement that is going to be executed
                $stmt = $conn->prepare("SELECT OrderDate, PaymentStatus, PaymentType, CustomerMail FROM orders WHERE OrderNumber = $orderNumber;");
                //Execute the previous defined statement
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                $order = $stmt->fetch();
                
                $orderDate = $order[0];
                $paymentStatus = $order[1];
                $paymentType = $order[2];
                $customerMail = $order[3];
            ?>
            
	</header>
        <div class="main">
            <div class="thanku">
                <p><strong>Thank you for your order!</strong></p>
                <p><strong>here are the details:</strong></p>
            </div>
            <p class="p">Payment status: <?php echo $paymentStatus;?></p>
            <p class="p">Order date: <?php echo $orderDate; ?></p>
            <p class="p">Confirmation will be sent to: <?php echo $customerMail; ?></p>
            <p class="p">Order number: <?php echo $OrderNumber; ?></p>
            <p class="p">you can <u>download</u> your ticket/s here:</p>
            <button class="btnc"><i class="fa fa-download"></i> Download</button>
            <br>
            <br>
            <br>
            <br>
            <p>Want to shop more? Go back to the HOME page <a href="homepage.php"><i class="fa fa-arrow-right"></i></a></p>
        </div>
		<?php include 'footer.php';?>
		
	</body>
</html>