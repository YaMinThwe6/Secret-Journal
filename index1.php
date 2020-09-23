<?php

    session_start();
    
    include("connect.php");
    
    $error="";
    
    if($_GET) {
        
        $error="";
        
        $email = $_GET["email"];
        
        $password = password_hash($_GET["password"] , PASSWORD_DEFAULT);
        
        $loggedin = $_GET["loggedin"];
        
        if (!$email){
            
            $error.= "*Please enter your email address!<br>"; 
            
        }
        
        if (!$_GET["password"]){
            
            $error.= "*Please enter your password!<br>";
            
        }
        
        else if ($email && $_GET["password"]){
            
            $query = "SELECT `Email` FROM `Signup` WHERE Email = '".mysqli_real_escape_string($link, $email)."'";
            
            if($result=mysqli_query($link,$query)) {
            
                $row = mysqli_fetch_array ($result);
                
                if ($row[0] == $email) {
                    
                    $query = "SELECT `Password` FROM `Signup` WHERE Email = '".mysqli_real_escape_string($link, $email)."'";
            
                    if($result1 = mysqli_query($link,$query)) {
                       
                        $row1 = mysqli_fetch_array ($result1);
                        
                        if(password_verify($_GET['password'] , $row1[0])){
                            
                            if($loggedin==1) {
                                
                                setcookie ("Email" , "$email" , time() + 60 * 60 * 48);
                                
                            } else {
                                
                                $_SESSION['email']=$email;
                                
                            }
                    
                            header("Location:cookies.php");
                    
                        } else {
                    
                            $error.= "*Invalid Password!<br>";
                    
                        }
                        
                    }
                
                } else {
        
                    $error.="*The email ID is not registered. Please click Register/Sign Up button at the bottom to sign up.";
                
                }
                
            }
        
        }
        
    }

?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>My Journal</title>
    
    <link rel="stylesheet" href="inde.css">
    
  </head>
  <body>
    <div id="header">
    
        <p class="display-4" id="headertext">My Secret Journal</p>
    
    </div>
    <div class="container">
        
        <div id="signin">
            
            <p id="signuptext">Let's continue to preserve our memories!</p>
            
            <div id="error">
                <?php 
                    if($error) {
                        echo "<p><b>Alert!</b></p>".$error;
                    }
                ?>
            </div>
            <form>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5">Keep me logged in</div>
                    <div class="col-sm-7">
                        <div class="form-check">
                            <input name="loggedin" class="form-check-input" type="checkbox" id="gridCheck1" value="1" checked>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                </div>
                <a href="updatepwd.php">Forgot password</a>
                <a id="register" href="index.php">Register/Sign Up</a>
            </form>
        </div>
        
        <div id="quotecontainer">
            <p id="quote">"<b>Memories</b>, either best or worst.<br>Preserving them is the best. For we might need them in the future."</p>
            
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
