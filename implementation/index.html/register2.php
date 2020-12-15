<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>َRegister Tickify</title>
    <link rel="stylesheet" href="register2.css">
  </head>
  <body>

<form class="box" action="register.php" method="post">
  <h1>Register
  </h1>  
  <input type="text" name="name" placeholder="Name">
  <input type="text" name="email" placeholder="E-Mail">
  <input type="text" name="phone_nr" placeholder="Phone Number">
  <input type="text" name="address" placeholder="Address">
  <input type="text" name="b_date" placeholder="Birthdate">
  <input type="password" name="password" placeholder="Password">
  <input type="password" name="pass_confirm" placeholder="Confirm your password">
  <input type="submit" name="submit" value="Sign Up">
</form>

  <?php
    if(isset($_POST['submit'])){
      $NAME = $_POST['name'];    
      $PHONE_NR = $_POST['phone_nr'];
      $ADDRESS = $_POST['address'];
      $PASSWORD = $_POST['password'];
      $PASS_CONFIRM = $_POST['pass_confirm'];

      $C_EMAIL = $_POST['email'];
      $C_BIRTHDAY = $_POST['b_date'];

      if(($NAME=="") or ($C_EMAIL== "")){
          echo "Please fill all in to continue";    
          echo "<a href='javascript:history.back();'>Back to register</a>";
      }
      else {
          $host = "prj1_postgres";
          $port = "5432";
          $db = "postgres";
          $user = "postgres";
          $pword = "mypassword";
          
          $dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pword";

          try{ 
            $connection = new PDO($dsn);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                
          } catch (PDOException $e){ 
            echo $e->getMessage(); 
          }
              
          pg_query($connection,"INSERT INTO CUSTOMER VALUES('$C_MAIL', '$PHONE_NR', '$PASSWORD', '', '$ADDRESS', '$NAME', '$C_BIRTHDAY' )");
              
          
          echo "Thank you for your interest, your data has been submited.<br>";
          
          pg_close($connection);
      }
    }     
  ?>
  </body>
</html>
