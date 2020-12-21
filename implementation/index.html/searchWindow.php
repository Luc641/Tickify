<?php     
    include 'databaseConnection.php';
    include 'navigation.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tickify - Search Window</title>
        <link rel="icon" href="../img/TickifyLogo.png" type="image/icon type">
    </head>
    <body>
        <?php
            
            $stmt = $conn->prepare("SELECT EventNr, E_Name FROM EVENTS");

            //Execute the previous defined statement
            $stmt->execute();
            
            $events = array();
            //
            $result = $stmt->setFetchMode(PDO::FETCH_NUM);

            while ($row = $stmt->fetch()) {
                $events[$row[0]] = $row[1];
              }   
        ?>
        
        <form action="event.php" method="get">
            <select name="eventNumber">
                
                <?php foreach (array_keys($events) as $id) { ?>
                
                <option name="<?php echo $id; ?>" value="<?php echo $id; ?>"><?php echo $events[$id] ?></option>
                
                <?php } ?>
                
            </select>
            <input type="submit">
        </form>
    </body>
</html>
