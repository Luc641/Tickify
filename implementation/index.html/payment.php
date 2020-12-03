<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="register.css" media="screen" />

<html>

        <form>
            
            <link rel="stylesheet" type="text/css" href="payment.css" media="screen" />
            
            <nav class="navbar">
                
                <div class="home">
                    
                    <button type="button" class="homebtn"> <img src="./images/home_mm.jpg" height="60" width="60"> </button> 
                    
                </div>
                
                <div class="category">
                    
                    <button type="button" class="categorybtn"> <img src="./categories1.png" height="60" width="60"> </button>
                    
                    <div class="categories">
                        
                        <a href=""> Category 1</a>
                        <a href=""> Category 2</a>
                        <a href=""> Category 3</a>
                        <a href=""> Category 4</a>
                        
                    </div>
                </div> 
                
                <div class="searchbar">
                    
                    <input type="text" id="search" name="search" placeholder="What are you looking for?">
                    
                    <button type="submit" class="searchbtn"> <img src="./images/searchbtn.png" height="60" width="60"> </button>
                    
                </div>
                
                <div id="myProfile">
                
                    <button class="myProfilebtn"><img src="./profile.png" width="50" height="50" alt="profile" ></button>

                    <div class="profileOptions">

                        <form>

                            <fieldset>

                                <legend>Log in details </legend>

                                <p>
                                    <label for="username">Username:</label>
                                    <input type="text" id="user" name="user"><br><br>

                                </p>

                                <p>
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password"><br><br>
                                </p>

                                <button id="login">Log In</button>

                                <button id="register">Register</button>

                            </fieldset>

                        </form>

                        <a href="">My profile</a>
                        <a href="">Log out</a>

                    </div>
                </div>
                
            </nav>
            
        
        <div> 
            
            <h1> Payment </h1>
            
            
            <hr>
            
            <label for="aname"> <b> Account Name: </b></label>
            <input type="text" placeholder="Enter your account name" name="aname" id="aname" required>
            
            <label for="anumb"> <b> Account Number: </b></label>
            <input type="number" placeholder="Enter your account number" name="anumb" id ="anumb" required>
            
            <label for="bname"> <b> Bank Name: </b></label>
            <input type="text" placeholder="Enter bank name" name="bname" id="bname" required>
            
            <label for="scode"> <b> Sort Code: </b></label>
            <input type="text" placeholder="Enter sort code" name="scode" id="scode" required>
            
            <label for="iban"> <b> IBAN </b></label>
            <input type="text" placeholder="Enter your IBAN" name="iban" id="iban" required>
            
            <label for="bic"> <b> BIC / Swift </b></label>
            <input type="text" placeholder="Enter bank name" name="bic" id="bic" required>
            
            <button type="submit" class="paymentbtn"> Confirm </button>
            <button type="button" class="cancelbtn"> Cancel </button>
            
            
            </div>
            
            
        
        </form>


</html>
