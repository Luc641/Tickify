<!DOCTYPE html>

<?php include 'databaseConnection.php';?>

<html>
    <head>
        <title>Tickify - Navigation Bar</title>
        <link rel="stylesheet" href="../css/navigation.css"><!-- link to stylesheet -->
    </head>
    
    <body>
        
        <nav class="navigation">
            
            <div class="navContainer">
                
                <a href ="" id="home" ><img src="../img/homebtn.png" height="50" width ="50" alt="logo"></a>
                
                <div id="categories">
                
                    <button class="dropdownbtn">Categories</button>

                    <div class="dropdown-content">
                        
                        <?php

                            $categories = array("Cinema & Theatre", "Musicals/Festivals/Concerts & Shows", "Sports", "Family", "Expositions");
                            
                            foreach ($categories as $category){

                        ?>

                        <a href=""><?php echo $category; ?></a>
                        
                            <?php } ?>
                        
                    </div>
                
                </div>
                    
                <input type="text" id="search" name="search" placeholder="Enter keyword"><br><br>

                <input type="image" id="searchbtn" alt="search" src="../img/searchButton.jpg" >
                    
                
                <div id="myProfile">
                
                    <button class="myProfilebtn"><img src="../img/myprofile.png" width="65" height="50" alt="profile" ></button>

                    <div class="profileOptions">

                        <?php
    
                            $link = $_SERVER['REQUEST_URI']; //get the link of actual page

                            $displayForm = true;

                            if (isset($_POST["loginBtn"])){ //trying to log in

                                //Get values from the form
                                $user = $_POST["user"];
                                $password = $_POST["password"];

                                try { //Check if user entered is in the system
                                    $stmt = $conn->prepare("SELECT C_Password "
                                                            . "FROM customer "
                                                            . "WHERE C_Mail = ?");

                                    //Execute the previous defined statement
                                    $stmt->execute([$user]); // table for C_mail = $user

                                    //
                                    $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                                    $row = $stmt->fetch();

                                    $customerPass = $row[0]; //password for customer table

                                    $stmt = $conn->prepare("SELECT O_Password "
                                                            . "FROM organizer "
                                                            . "WHERE O_Mail = ?");

                                    //Execute the previous defined statement
                                    $stmt->execute([$user]); // table for O_mail = $user

                                    //
                                    $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                                    $row = $stmt->fetch();

                                    $organizerPass = $row[0]; //password for organizer table

                                    $stmt = $conn->prepare("SELECT A_Password "
                                                            . "FROM administrator "
                                                            . "WHERE A_Mail = ?");

                                    //Execute the previous defined statement
                                    $stmt->execute([$user]); // table for A_mail = $user

                                    //
                                    $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                                    $row = $stmt->fetch();

                                    $adminPass = $row[0]; //password for admin table

                                } catch (PDOException $e){ //report error as user not in system
                                    echo "Invalid username or password";    
                                }

                                if (isset($customerPass)){
                                    if ($customerPass == $password){ //log in if user is a customer and correct password
                                        $displayForm = false;
                                    }

                                    else {
                                        echo "Invalid username or password";
                                    }

                                }

                                else if (isset($organizerPass)){
                                    if ($organizerPass == $password){ //log in if user is an organizer and correct password
                                        $displayForm = false;
                                    }

                                    else {
                                        echo "Invalid username or password";
                                    }
                                }

                                else if (isset($adminPass)){ //log in if user is an admin and correct password
                                    if ($adminPass == $password){
                                        $displayForm = false;
                                    }

                                    else {
                                        echo "Invalid username or password";
                                    }
                                }

                                else {
                                    echo "Invalid username or password";
                                }

                                //Erase all the initialized variables
                                unset($_POST["loginBtn"]);
                                unset($user);
                                unset($password);
                                unset($customerPass);
                                unset($organizerPass);
                                unset($adminPass);
                            }

                            if (isset($_POST["logoutBtn"])){ //log out case
                                $displayForm = true;
                                unset($_POST["logoutBtn"]);
                            }

                            if ($displayForm){ // Show log in form

                        ?>

                            <form name="login" method="post" action=<?php $link ?>>

                                <fieldset>

                                    <legend>Log in details </legend>

                                    <p>
                                        <label for="user">Username:</label>
                                        <input type="text" id="user" name="user"><br><br>

                                    </p>

                                    <p>
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password"><br><br>
                                    </p>

                                    <input type="submit" name="loginBtn" id="logIn" value="Log In">

                                </fieldset>

                            </form>

                        <?php

                            } else { // Show log out form/button

                        ?>

                            <form name="logout" method="post" action=<?php $link ?>>

                                <fieldset>

                                    <input type="submit" name="logoutBtn" id="logIn" value="Log Out">

                                </fieldset>

                            </form>

                        <?php

                            }

                        ?>

                        <a href="">My profile</a>

                    </div>
                </div>
                
            </div>

        </nav><!-- End of the navigation menu -->

    </body>
    
</html>
