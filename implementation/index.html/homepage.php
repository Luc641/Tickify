<!DOCTYPE html>
<?php include "C:\Users\Tim\Documents\GitHub\prj1-2020-group-prj1-2020-15\implementation\index.html\databaseConnection.php"?>
<html>
<head>
    <title>Tickify Homepage</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/homepage_style.css">

</head>
<body>
    <header>
    <?php
        
        ?>
        
        <div class="wrapper">
            
            
            <ul class="topnav">
                <li>
                    <div class="logo">
                        <a href="homepage.html"><img src="../img/home.png" height="30px" alt=""></a>
                    </div>
                </li>
                

                <li id="categories">
                    <div class="dropdown">
                        <button class="dropbtn" ><a class="categories" href="#"><img src="../img/categories.png" height="25" width="25"></a></i></button>
                        <div class="dropdown-content">
                            <a href="#search-theatre">Theatre</a>
                            <a href="#search-musicals">Musicals</a>
                            <a href="#search-festivals">Festivals</a>
                            <a href="#search-Concerts">Concerts</a>
                            <a href="#search-sports">Sports</a>
                            <a href="#search-family">Family</a>
                            <a href="#search-expositions">Expositions</a>
                        </div>
                    </div> 
                    
                </li>
                <li>
                    <div class="searchbar">
                    <input type="text" placeholder="S e a r c h . . .">
                    <a href="search_event.html"><input type="image" src="../img/search.png" width="25" height="25px" alt="submit"></a>
                    </div>
                </li>
                
                <li id="profile-button">
                    <form action="pruefform_bestellung.php" method="POST">

                    
                    <div class=" profile">
                        
                        <div class="dropdown">
                            <button><a href="#"><img src="../img/profile.png" height="25px" alt=""></a></button>
                            
                            <div class="dropdown-content">
                                <br>
                                E-Mail <input type="text" id="email"><br><br>
                                Password <input type="password" id="password"><br><br>
                                <button type="submit">Login</button>                                                          
                                <button> <a href="C:\Users\s0urce\Documents\Code\Webpage\register\register.html">Register</a></button>  
                            </div>
                        </div> 
                        
                    </div>
                </form>
            </li>
            </ul>
        </div>
        
    </header>
    <section class="events">
    <div class="first_event">
        <table border="1">
            <tr class="firstRow">
                <td><?php
                $eventName = $_POST["eventName"];
                $eventNumber = $_POST["eventNumber"];
                
               
                $result = pg_query($conn, "SELECT e_name FROM events");
                echo "$result";               
                ?>
                </td>
                <td>Event 2</td>
                <td>Event 3</td>
            </tr>
    </div>
            <tr class="secondRow">
                <td>Event 4</td>
                <td>Event 5</td>
                <td>Event 6</td>
            </tr>

            <tr class="thridRow">
                <td>Event 7</td>
                <td>Event 8</td>
                <td>Event 9</td>
            </tr>

        </table>


    </section>


     
    <footer>
    
    
        <table class="infos" border="1">
            <tr>
                <td><button>Contact Info</button></td>
            </tr>
            <tr>
                <td>Payment Options</td>
                
            </tr>
        </table>
    
    </footer>

</body>
</html>