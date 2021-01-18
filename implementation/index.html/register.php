<!DOCTYPE html>

<?php include 'databaseConnection.php'?>


   <html> 
        
        
        <form> 
            
            <link rel="stylesheet" type="text/css" href="payment&register.css" media="screen" />
        
        <div> 
            
            <h1> Registration </h1>
            
            <p> Fill out this form to create a Tickify account.</p>
            
            <hr>
            
            <label for="email"> <b> E-Mail: </b></label>
            <input type="text" placeholder="Enter E-Mail Address" name="email" id ="email" required>

            <label for="psw"> <b> Password: </b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

            <label for="psw-repeat"> <b> Repeat Password: </b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>

            <label for="uname"> <b> Username: </b></label>
            <input type="text" placeholder="Enter Username" name="uname" id="uname" required>

            <label for="phone"> <b> Phone Number: </b></label>
            <input type="text" placeholder="Enter Phone Number" name="phone" id="phone" required>

            <label for="address"> <b> Address: </b></label>
            <input type="text" placeholder="Enter Your Adress" name="address" id="address" required>
            
            <label for="bdate"> <b> Birth Date: </b></label>
            <input type="date" placeholder="Enter Date of Birth" name="bdate" id ="bdate" required>
            
            
            
            <button type="submit" class="registerbtn"> Confirm </button>
            <button type="button" class="registerbtn"> Cancel </button>
            
            
            
            
            
        
        </form>
        

    </html>
