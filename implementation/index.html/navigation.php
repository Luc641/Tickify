<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

                        <a href="">Cinema & Theatre</a>
                        <a href="">Musicals/Festivals/Concerts & Shows</a>
                        <a href="">Sports</a>
                        <a href="">Family</a>
                        <a href="">Expositions</a>

                    </div>
                
                </div>
                    
                <input type="text" id="search" name="search" placeholder="Enter keyword"><br><br>

                <input type="image" id="searchbtn" alt="search" src="../img/searchButton.jpg" >
                    
                
                <div id="myProfile">
                
                    <button class="myProfilebtn"><img src="../img/myprofile.png" width="65" height="50" alt="profile" ></button>

                    <div class="profileOptions">

                        <form>

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

                                <button id="logIn">Log In</button>

                                <button id="register">Register</button>

                            </fieldset>

                        </form>

                        <a href="">My profile</a>
                        <a href="">Log out</a>

                    </div>
                </div>
                
            </div>

        </nav><!-- End of the navigation menu -->

    </body>
    
</html>
