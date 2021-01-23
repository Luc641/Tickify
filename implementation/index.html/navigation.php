<?php 
    include ("functions.php");
?>
<!DOCTYPE html>

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
                
                <?php if($_SESSION["displaySearchBar"] || (!isset($_SESSION["displaySearchBar"]))){ ?>
                
                <div class="searchByCategories">
                    
                    <input type="button" id="displayCategories" value="Categories">
                    
                    <div class="categoriesList">
                        
                        <form name="selectCategory" method="get" action="searchWindow.php">
                            
                            <input type="submit" id="categorySearch" name="categorySearch" value="Cinema & Theatre"> <br>
                            <input type="submit" id="categorySearch" name="categorySearch" value="Concerts & Festivals"> <br>
                            <input type="submit" id="categorySearch" name="categorySearch" value="Sports"> <br>
                            <input type="submit" id="categorySearch" name="categorySearch" value="Family"> <br>
                            <input type="submit" id="categorySearch" name="categorySearch" value="Expositions"> <br>
                            
                        </form>
                        
                    </div>
                    
                </div>
                
                <div class="searchByText">
                    
                    <form name="searchText" method="get" action="searchWindow.php">
                            
                        <input type="text" id="searchTextbox" name="searchText" placeholder="Enter keyword"> <br>

                        <button type="submit" id="searchBtn"><img src="../img/searchButton.jpg" height="40" width ="50" alt="logo"></button>

                    </form>
                    
                </div>
                
                <?php } else { ?>
                    
                <input type="text" id="windowTitle" readonly="readonly" value="<?php echo htmlspecialchars($_SESSION["windowTitle"]); ?>">
                
                <?php } ?>
                
                <div class="myProfile">
                    
                    <button id="myProfilebtn"><img src="../img/myprofile.png" width="65" height="50" alt="profile" ></button>
                   
                    <div class="profileMenu">
                       
                        <?php if ($_SESSION["displayForm"]){ // Show log in form ?>
                       
                        <form name="login" method="post" action="">

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
                                
                                <?php if (isset($_POST["loginError"])) { ?> 
                                
                                <p id="loginError"><?php echo $_POST["loginError"]; ?></p> 
                                
                                <?php } ?>

                                <input type="submit" name="loginButton" id="loginBtn" value="Log In">
                                
                                

                            </fieldset>

                        </form>
                        
                        <form name="register" action="register.php">
                            
                            <input type="submit" name="registerBtn" id="register" value="Register" >
                            
                        </form>
                       
                        <?php } else { // Show log out form/button ?>
                       
                        <form name="logout" method="post" id="logoutForm" action="homepage.php">
                            
                            <input type="submit" name="logoutButton" id="logoutBtn" value="Log Out">

                        </form>
                        
                        <?php } ?>
                       
                        <a href=""> My Profile </a>
                       
                    </div>
                    
                </div>
                
            </div>
            
        </nav>
        
    </body>

</html>
