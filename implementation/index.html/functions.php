<?php
    session_start();

    include ("databaseConnection.php");
    
    if (!isset($_SESSION["userType"])){
        $_SESSION["displayForm"] = true;
        $_SESSION["displaySearchBar"] = true;
        $_SESSION["windowTitle"] = "";
    } else {
        $_SESSION["displayForm"] = false;
    }
    
    if (isset($_POST["loginButton"])) {
        unset($_POST["loginButton"]);
        List($_SESSION["displayForm"], $_SESSION["displaySearchBar"], $_SESSION["windowTitle"]) = manageLogin($conn);
        sendHeader();
        
    } elseif (isset($_POST["logoutButton"])){
        unset($_POST["logoutButton"]);
        unset($_SESSION["userType"]);
        unset($_SESSION["user"]);
        List($_SESSION["displayForm"], $_SESSION["displaySearchBar"]) = manageLogout();
    }

    function manageLogin($conn){

        $user = $_POST["user"];
        $password = $_POST["password"];
        
        if (isCustomer($user, $conn)){
            
            if(login(customerQuery($user, $conn), $password)){
                $_SESSION["userType"] = 0;
                $_SESSION["user"] = $user;
                unset($_POST["loginError"]);

                $displayForm = false;
                $displaySearchBar = true;

            }
            
        } elseif(isOrganizer($user, $conn)){
            
            if(login(organizerQuery($user, $conn), $password)){
                $_SESSION["userType"] = 1;
                $_SESSION["user"] = $user;
                unset($_POST["loginError"]);

                $displayForm = false;
                $displaySearchBar = false;
                $windowTitle = "ORGANIZER PROFILE WINDOW";
                
            }
            
        } elseif(isAdmin($user, $conn)){
            
            if(login(adminQuery($user, $conn), $password)){
                $_SESSION["userType"] = 2;
                $_SESSION["user"] = $user;
                unset($_POST["loginError"]);

                $displayForm = false;
                $displaySearchBar = false;
                $windowTitle = "ADMIN PROFILE WINDOW";
            }
            
        } else {
            
            $displayForm = true;
            $displaySearchBar = true;
            $windowTitle = "";
            $_POST["loginError"] = "Invalid username or password. Please try again!";
            
        }
        
        $data = array($displayForm, $displaySearchBar , $windowTitle);
        
        return $data;
    }
    
    function sendHeader(){
        
        if ($_SESSION["userType"] == 0){
            header("Location: ".$_SERVER['REQUEST_URI'], true);
            exit();
            
        } elseif ($_SESSION["userType"] == 1){
            header("Location: http://localhost/try/organizer.php", true);
            exit();
            
        } elseif ($_SESSION["userType"] == 2){
            header("Location: http://localhost/php/AdminProfile.php", true);
            exit();
            
        }
    }
    
    function manageLogout(){
        unset($_POST["logoutBtn"]);
        unset($_SESSION["userType"]);
        
        $displayForm = true;
        $displaySearchBar = true;
        
        $data = array($displayForm, $displaySearchBar);
        
        return $data;
    }
    
    function customerQuery($user, $conn){
        
        $customerPass = "";
        
        try { //Check if user entered is in the system
            $stmt = $conn->prepare("SELECT C_Password "
                                    . "FROM customer "
                                    . "WHERE C_Mail = ? and Status = true");

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
    
    function isCustomer($user, $conn){
        
        $pass = customerQuery($user, $conn);
        
        if ($pass == ""){
            return false;
        } else {
            return true;
        }
        
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
    
    function isOrganizer($user, $conn){
        
        $pass = organizerQuery($user, $conn);
        
        if ($pass == ""){
            return false;
        } else {
            return true;
        }
        
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
    
    function isAdmin($user, $conn){
        
        $pass = adminQuery($user, $conn);
        
        if ($pass == ""){
            return false;
        } else {
            return true;
        }
        
    }
    
    function login($pass, $password){
        if ($pass == $password){
            return true;
        } else {
            return false;
        }
    }
    
?>