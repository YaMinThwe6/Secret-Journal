<?php
    
    session_start();
    
    include("connect.php");
    
    $error="";
            
    $success="";
    
    if($_SESSION['Keytoq']) {
        
        if($_POST) {
        
            $error="";
            
            //$success="";
        
            $newpassword=$_POST['np'];
        
            $confirmpassword=$_POST['cp'];
            
            if (!$_POST["np"]){
            
                $error.= "*Please enter the new password!<br>";
            
            }
            
            if (!$_POST["cp"]){
            
                $error.= "*Please enter the confirm password!<br>";
            
            }
        
            if($newpassword == $confirmpassword) {
                
                $cfp = password_hash($_POST['cp'] , PASSWORD_DEFAULT);
            
                $query="UPDATE `Signup` SET Password='".mysqli_real_escape_string($link,$cfp)."' WHERE keytoq='".mysqli_real_escape_string($link,$_SESSION['Keytoq'])."'";
        
                if($result=mysqli_query($link,$query)){
                    
                    //echo "Password successfully updated!!!";
                    
                    header("Location:index1.php");
                    
                }   
                
            } else {
                
                $error.="*The new password and the confirm password didn't match. Please try again.";
                
            }
            
        }
        
    } else {
        
        header("Location:index1.php");
        
    }



?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
        <title>My Journal</title>
        
        <style type="text/css">
            
            body{
            
            padding:0;
            margin:0;
            font-family:ReithSans,Arial,Helvetica,freesans,sans-serif;
            background-image:url("secret journal.jpg");
            background-size:cover;
            
            }
            
            #headertext{
            
            text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
            text-align:center;
            color:Black;
            padding:5px;
            
            }
            
            .logout{
                
                text-align:center;
                color:black;
                font-weight:bold;
                margin:10px;
                
            }
            
            form{
                
                background:#B2E3F0;
                border:1px solid black;
                border-radius:10px;
                padding:20px;
                
            }
            
            #subheading{
                
                color:green;
                text-align:center;
                text-shadow: -1px -1px 0 yellow, 1px -1px 0 yellow, -1px 1px 0 yellow, 1px 1px 0 yellow;
                font-size:20px;
                
            }
            
            #error{
                
                color:red;
                font-size:18px;
                text-align:center;
                
            }
            
        </style>
        
    </head>
    <body>
        <div class="container"> 
        <p class="display-4" id="headertext">My Secret Journal</p>
        <p id="subheading">Please fill the following columns to change your password!</p>
        <div id="error"><?php echo $error; ?></div>
        <form method=post>
            <div class="form-group">
                <label for="np">Enter the New password</label>
                <input name="np" type="password" class="form-control" id="np">
            </div>
            <div class="form-group">
                <label for="cp">Enter the Confirm password</label>
                <input name="cp" type="password" class="form-control" id="cp">
            </div>
            <button  type="submit" id="save" class="btn btn-primary logout">Submit</button>
            <a href="index1.php">Go Back to Log In page</a>
        </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script type="text/javascript">
            
            
            
        </script>
      </body>
</html>