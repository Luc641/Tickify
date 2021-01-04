<!DOCTYPE html>
<?php include "databaseConnection.php" ?>
<html>
<head>
    <title>Tickify Homepage</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="homepage_style.css">

</head>
<body>
    <header>
    <?php
        if(isset($_POST['submit'])){
            require "search_event.php";
        }
        ?>
        
        <div class="wrapper">
            
            
            <ul class="topnav">
                <li>
                    <div class="logo">
                        <a href="homepage.php"><img src="TickifyLogo.png" height="30px" alt=""></a>
                    </div>
                </li>
                

                <li id="categories">
                    <div class="dropdown">
                        <button class="dropbtn" ><a class="categories" href="#"><img src="categories.png" height="25" width="25"></a></i></button>
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
                        <form action="search_event.php" method="post">

                            <input type="text" name="search"placeholder="S e a r c h . . .">
                            <input type="submit" name ="submit" value="search"/>
                        </form>
                        <!-- <a href="search_event.html"><input type="image" src="search.png" width="25" height="25px" alt="submit"></a> -->
                    </div>
                </li>
                
                <li id="profile-button">
                    <form action="pruefform_bestellung.php" method="POST">

                    
                    <div class=" profile">
                        
                        <div class="dropdown">
                            <button><a href="#"><img src="profile.png" height="25px" alt=""></a></button>
                            
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

                    $sqlSelect = "SELECT * FROM events";
                    $stmt= $conn->query($sqlSelect);
                    $i = 0;
                    foreach($stmt as $row){
                        if($i > 0){
                            break;
                        }
                        $image = $row['filepath'];
                        echo "<a href=#><h1>".$row['e_name'] . "</a></h1><br/>";
                        echo "<img src=$image width=250px height=250px><br>";
                        //printf($image);
                        $i = $i + 1;
                    }

                
                ?></td>
                <td><?php
                    $sqlSelect = "SELECT * FROM events";
                    $stmt= $conn->query($sqlSelect);
                    $i = -1;
                    foreach($stmt as $row){
                        $i = $i +1 ;
                        if($i != 1){
                            continue;
                        }
                        $image = $row['filepath'];
                        echo "<a href=#><h1>".$row['e_name'] . "</a></h1><br/>";
                        echo "<img src=$image width=250px height=250px>";
                        
                    }
                    ?></td>
                
            </tr>
    </div>
            <tr class="secondRow">
                <td>
                <?php
                    $sqlSelect = "SELECT * FROM events";
                    $stmt= $conn->query($sqlSelect);
                    $i = -1;
                    foreach($stmt as $row){
                        $i = $i +1 ;
                        if($i != 2){
                            continue;
                        }
                        $image = $row['filepath'];
                        echo "<a href=#><h1>".$row['e_name'] . "</a></h1><br/>";
                        echo "<img src=$image width=250px height=250px>";
                        
                    }
                    ?>
                </td>
                <td><?php
                    $sqlSelect = "SELECT * FROM events";
                    $stmt= $conn->query($sqlSelect);
                    $i = -1;
                    foreach($stmt as $row){
                        $i = $i +1 ;
                        if($i != 3){
                            continue;
                        }
                        $image = $row['filepath'];
                        echo "<a href=#><h1>".$row['e_name'] . "</a></h1><br/>";
                        echo "<img src=$image width=250px height=250px>";
                        
                    }
                    ?></td>
                
            </tr>
                </table >
                <table class="bottomRow">

            <tr class="thridRow">
                <td width=100%><?php
                    $sqlSelect = "SELECT * FROM events";
                    $stmt= $conn->query($sqlSelect);
                    $i = -1;
                    foreach($stmt as $row){
                        $i = $i +1 ;
                        if($i != 4){
                            continue;
                        }
                        $image = $row['filepath'];
                        echo "<a href=#><h1>".$row['e_name'] . "</a></h1><br/>";
                        echo "<img src=$image width=250px height=250px>";
                        
                    }
                    ?></td>
                
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