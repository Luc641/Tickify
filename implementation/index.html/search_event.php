<!DOCTYPE html>
<html>
<head>
    <title>Search Page</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="searchevent_style.css">

</head>
<body>
     <?php 
    // include "databaseConnection.php";
    // if(isset($_POST["submit"])){
    //     $search = $_POST['search'];
        
    //     if($search==""){
    //         echo "<h1>Its empty</h1>";
    //         exit();
    //     }

    //     $sql = "SELECT * FROM events WHERE e_name LIKE '%$search%' LIMIT 5";
    //     $stmt = $conn->query($sql);
    //     foreach($stmt as $row){
    //         echo $row[$search];
    //         echo $row['e_description'];
    //         echo $row['e_date'];
    //     }
    // }
    ?>
    <header>
    <?php
        // if(isset($_POST['submit'])){
        //     require "search_event.php";
        // }
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
    <section>
        <ul class="results">
            <li>
                <!-- <table class="firstRow">
                    <tr><td> -->

                <?php
                    include "databaseConnection.php";
                    if(isset($_POST["submit"])){
                        $search = $_POST['search'];
                        
                        if($search==""){
                            echo "<h1>It's empty</h1>";
                            exit();
                        }
                        

                        $sql = "SELECT * FROM events WHERE e_name LIKE '%$search%' LIMIT 5";
                        $sqlCount = "SELECT COUNT(*) FROM events WHERE e_name LIKE '%$search%' LIMIT 5";
                        $stmt = $conn->query($sql);
                        $stmt2 = $conn->query($sql);
                        $count = $stmt2->fetchColumn();
                        $i = 0;
                    
                        if($count >0 ){
                            foreach($stmt as $row){
                                echo "<table><tr>";
                                echo "<td width=150px><img  src=$row[filepath] width=250px height=250px></td><br/>";
                                
                                echo "<td><a href=#><h1>".$row['e_name'] . "</h1></a><br/>";
                                echo "<h3>". $row['e_description']."</h3></td><p/>";
                                echo "<td>".$row['e_date']."</td>";
                                echo "</tr></table>";
                            }
                            
                        }else{
                            echo "No results  for " . $search ." found!";
                            exit();
                        }
                        
                    }
                ?>
                <!-- </td>
                </tr>
                </table> -->
            </li>
            <!-- <li><table><tr><td>Event 2</td></tr></table></li>
            <li>Event 3</li>
            <li>Event 4</li> -->
        </ul>
        


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