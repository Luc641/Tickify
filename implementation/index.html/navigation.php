<!DOCTYPE html>

<?php 
    
    include 'databaseConnection.php';
    include "loginFunctions.php";
?>

<html>
    
    <head>
        <link rel="stylesheet" href="../css/navigation.css"><!-- link to stylesheet -->
    </head>
    
    <body>
        
        <nav class="navigationBar">
            
            <div class="container">
                
                <div class="homepageLink">
                    
                    <a href ="" id="toHomepage" ><img src="../img/homebtn.png" height="50" width ="50" alt="logo"></a>
                    
                </div>
                
                <div class="searchByCategories">
                    
                    <input type="button" id="displayCategories" value="Categories">
                    
                    <div class="categoriesList">
                        
                        <form name="selectCategory" method="get" action=<?php $link ?>>
                            
                            <input type="submit" id="categorySearch" name="categorySearch" value="Cinema & Theatre"> <br>
                            <input type="submit" id="categorySearch" name="categorySearch" value="Concerts & Festivals"> <br>
                            <input type="submit" id="categorySearch" name="categorySearch" value="Sports"> <br>
                            <input type="submit" id="categorySearch" name="categorySearch" value="Family"> <br>
                            <input type="submit" id="categorySearch" name="categorySearch" value="Expositions"> <br>
                            
                        </form>
                        
                    </div>
                    
                </div>
                
                <div class="searchByText">
                    
                    <form name="searchText" method="get" action=<?php $link ?>>
                            
                        <input type="text" id="searchTextbox" name="searchText" placeholder="Enter keyword"> <br>

                        <button type="submit" id="searchBtn"><img src="../img/searchButton.jpg" height="40" width ="50" alt="logo"></button>

                    </form>
                    
                </div>
                
                <div class="myProfile">
                    
                    <button id="myProfilebtn"><img src="../img/myprofile.png" width="65" height="50" alt="profile" ></button>
                   
                    <div class="profileMenu">
                       
                        <?php
    
                            $link = $_SERVER['REQUEST_URI']; //get the link of actual page

                            $displayForm = true;
                            
                            unset($_POST["loginError"]);

                            if (isset($_POST["loginBtn"])){ //trying to log in

                                //Get values from the form
                                $user = $_POST["user"];
                                $password = $_POST["password"];
                                $loginInfo = array();
                                
                                array_push($loginInfo, customerQuery($user, $conn));
                                array_push($loginInfo, organizerQuery($user, $conn));
                                array_push($loginInfo, adminQuery($user, $conn));

                                $displayForm = login($loginInfo, $password, $user);

                            }

                            if (isset($_POST["logoutBtn"])){ //log out case
                                $displayForm = logout();
                            }
                            
                        ?>
                       
                        <?php

                            if ($displayForm){ // Show log in form

                        ?>
                       
                        <form name="login" method="post" action=<?php $link ?>>

                            <fieldset>

                                <legend>Log in </legend>

                                <p>
                                    <label for="user">Username:</label>
                                    <input type="text" id="userBox" name="user">

                                </p>

                                <p>
                                    <label for="password">Password:</label>
                                    <input type="password" id="passwordBox" name="password">
                                </p>

                                <input type="hidden" name="userType" value="">
                                
                                <?php if (isset($_POST["loginError"])) { ?> 
                                
                                <p id="loginError"> <?php echo $_POST["loginError"]; ?> </p> 
                                
                                <?php } ?>

                                <input type="submit" name="loginBtn" id="loginBtn" value="Log In">
                                
                                <input type="button" name="registerBtn" id="register" value="Register" >

                            </fieldset>

                        </form>
                       
                        <?php

                            } else { // Show log out form/button

                        ?>
                       
                        <form name="logout" method="post" class = "logoutForm" action=<?php $link ?>>

                            <input type="submit" name="logoutBtn" id="logoutBtn" value="Log Out">

                        </form>
                        
                        <?php

                            }

                        ?>
                       
                        <a href=""> My Profile </a>
                       
                    </div>
                    
                </div>
                
            </div>
            
        </nav>
        
    </body>
    
</html>
