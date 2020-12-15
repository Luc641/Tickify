
<?php
    
    function login($loginInfo, $password, $user){ 
        
        $displayForm = true;
        
        if (!empty($loginInfo[0])){
            if ($loginInfo[0] == $password){ //log in if user is a customer and correct password
                $displayForm = false;

                $_SESSION["user"] = $user;
                $_SESSION["userType"] = 0;
                
                unset($_POST["loginError"]);
                
            }
        }

        else if (!empty($loginInfo[1])){
            if ($loginInfo[1] == $password){ //log in if user is an organizer and correct password
                $displayForm = false;

                $_SESSION["user"] = $user;
                $_SESSION["userType"] = 1;
                
                unset($_POST["loginError"]);
            }
        }

        else if (!empty($loginInfo[2])){ //log in if user is an admin and correct password
            if ($loginInfo[2] == $password){
                $displayForm = false;

                $_SESSION["user"] = $user;
                $_SESSION["userType"] = 2;
                
                unset($_POST["loginError"]);
            }
        }
        
        if ($displayForm){
            $_POST["loginError"] = "Invalid username or password. Please try again!";
        }
        
        unset($_POST["loginBtn"]);
        unset($user);
        unset($password);
        unset($loginInfo);
        
        return $displayForm;

//        else {
//            echo "Invalid username or password";
//        }
        
    }
    
    function logout(){
        unset($_POST["logoutBtn"]);
        
        session_unset();
        
        return true;
    }
    
    function customerQuery($user, $conn){
        
        $customerPass = "";
        
        try { //Check if user entered is in the system
            $stmt = $conn->prepare("SELECT C_Password "
                                    . "FROM customer "
                                    . "WHERE C_Mail = ?");

            //Execute the previous defined statement
            $stmt->execute([$user]); // table for C_mail = $user

            //
            $result = $stmt->setFetchMode(PDO::FETCH_NUM);

            $row = $stmt->fetch();

            $customerPass = $row[0]; //password for customer table
            
        } catch (PDOException $e){ //report error as user not in system
            $customerPass= "";   
        }
        
        return $customerPass;
    }
    
    function organizerQuery($user, $conn){
        
        try { //Check if user entered is in the system
            $stmt = $conn->prepare("SELECT O_Password "
                                    . "FROM organizer "
                                    . "WHERE O_Mail = ?");

            //Execute the previous defined statement
            $stmt->execute([$user]); // table for O_mail = $user

            //
            $result = $stmt->setFetchMode(PDO::FETCH_NUM);

            $row = $stmt->fetch();

            $organizerPass = $row[0]; //password for organizer table

        } catch (PDOException $e){ //report error as user not in system
            $organizerPass= "";    
        }
        
        return $organizerPass;
    }
    
    function adminQuery($user, $conn){
        
        try { //Check if user entered is in the system
            $stmt = $conn->prepare("SELECT A_Password "
                                    . "FROM administrator "
                                    . "WHERE A_Mail = ?");

            //Execute the previous defined statement
            $stmt->execute([$user]); // table for A_mail = $user

            //
            $result = $stmt->setFetchMode(PDO::FETCH_NUM);

            $row = $stmt->fetch();

            $adminPass = $row[0]; //password for admin table
        
        } catch (PDOException $e){ //report error as user not in system
            $adminPass= "";    
        }
        
        return $adminPass;       
    }
        
?>

