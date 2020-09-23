<?php

    session_start();

    include("connect.php");
    
    $error="";
    
    if($_GET) {
        
        $error="";
        
        $name = $_GET["name"];
        
        $email = $_GET["email"];
        
        $password = password_hash($_GET["password"] , PASSWORD_DEFAULT);
        
        $gender = $_GET["gender"];
        
        $question = $_GET["gridRadios"];
        
        $keytoq = $_GET["keytoq"];
        
        $loggedin = $_GET["loggedin"];
        
        if (!$name){
            
            $error.= "*Please enter your name!<br>";
            
        }
        
        if (!$email){
            
            $error.= "*Please enter the email address!<br>"; 
            
        }
        
        if (!$_GET["password"]){
            
            $error.= "*Please enter the password!<br>";
            
        }
        
        if (!$_GET['keytoq']) {
            
            $error.="*Please enter the answer for the selected question!<br>";
            
        }
        
        else if ($email && $_GET["password"] && $name && $keytoq){
            
            $query = "SELECT `Email` FROM `Signup` WHERE email = '".mysqli_real_escape_string($link, $_GET['email'])."'";
            
            $result=mysqli_query($link,$query);
            
            if (mysqli_num_rows($result)>0) {
            
                $error.= "*Email already registered!!<br><br>";
                
            } else {
        
                $query = "INSERT INTO `Signup` (`Name` , `Email` , `Password` , `Gender` , `question` , `keytoq` , `LoggedIn`) VALUES('".mysqli_real_escape_string($link,$name)."','".mysqli_real_escape_string($link,$email)."','".mysqli_real_escape_string($link,$password)."','".mysqli_real_escape_string($link,$gender)."','".mysqli_real_escape_string($link,$question)."','".mysqli_real_escape_string($link,$keytoq)."','$loggedin')";
        
                if ($result=mysqli_query($link,$query)){
                    
                    if($loggedin==1) {
                        
                        setcookie ("Email" , "$email" , time() + 60 * 60 * 24 * 60);
                        
                    } else {
                        
                        $_SESSION["Email"] = $email; 
                        
                    }
                    
                    header("Location:cookies.php");
                
                } else {
                    
                    $error.= "<p>*There was a problem signing you up! - Please try again later!</p>";
                    
                }
            }
        
        }
        
    }
         
        
?>
