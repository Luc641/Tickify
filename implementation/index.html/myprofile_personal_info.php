<?php     
    include 'databaseConnection.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
        <main></main>

            <nav id="nav_bar">                 
                <ul>
                    <li id="home_button"><a class="button active"  href="#home">Home</a></li>                    
                    <li id="categories">  
                        <div class="dropdown">
                            <button class="dropbtn" >Categories</i></button>
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
                        <div class="search-container">
                            <input type="text" id="search_bar" placeholder="Search...">
                            <button type="submit" ><img src="search.png" id="search_button" alt="search"></button></a>
                        </div>
                    </li>  
                    <li id="profile_button">
                        <div class="dropdown">
                            <button class="dropbtn" >Profile</i></button>
                            <div class="dropdown-content">
                                <br>
                                E-Mail <input type="text" id="email"><br><br>
                                Password <input type="password" id="password"><br><br>
                                <button type="submit">Sign up</button>                                                          
                                <button> <a href="">Register</a></button>  
                            </div>
                        </div> 
                    </li>
                                                          
                </ul>
            </nav>



            <aside>
                <p id="aside_header">My Profile</p>
                <div class="sidebar">
                    <a class="active" href="#home">Personal Information</a>
                    <a href="myprofile_orders.php">My Orders</a>
                    <a href="#news">Unsubscribe</a>                
                </div>
			</aside>

            <article>
                <?php
                    $email = "customer10@outlook.com";
                    $sql = "Select * From Customer where c_mail = '$email'";

                    $result = $conn->query($sql);
                   
                    foreach ($result as $row)
                    {
                        echo "<br><b>Name: </b>         " . $row['c_name'];
                        echo "<br><b>E-Mail: </b>       " . $row['c_mail'];
                        echo "<br><b>Phone Number: </b> " . $row['c_phonenr'];                        
                        echo "<br><b>Address: </b>      " . $row['c_address'];
                        echo "<br><b>Birthdate: </b>    " . $row['c_birthdate'];
                
                    }
                    
                ?>        
            </article>
            
            <footer>
			    FOOTER
			</footer>
        </main>
           
    </body>
</html>    