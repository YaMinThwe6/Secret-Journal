<?php
    
    session_start();
    
    $link = mysqli_connect("shareddb-v.hosting.stackcp.net","Secretjournal12-3134375a34","12werghj","Secretjournal12-3134375a34");
    
    if(mysqli_connect_error()) {
        
        die ("Error Connection!");
        
    }
    
    $error="";
    
    if($_POST) {
        
        $error="";
        
        $email=$_POST["email"];
        
        if(!$email) {
            
            $error.="*Please enter the email address.";
            
        } 
        
        else if($email){
            
            $query="SELECT 'email' FROM `Signup` where email='".mysqli_real_escape_string($link,$email)."'";
            
            $result=mysqli_query($link,$query);
            
            if(mysqli_num_rows($result)>0) {
            
            $_SESSION['emailid']=$email;
            
            header("Location:Q.php");
            
            } else {
                
                $error.="*The email ID you entered is not registered. Please click the register button below to sign up.";
                
            }
            
        } else {
            
            $error.="*Something is wrong. Please try again later";
    
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
                text-align:center;
                font-size:18px;
                
            }
            
            a{
                
                border-right:1px solid grey;
                padding-right:5px;
                
            }
            
        </style>
        
    </head>
    <body>
        <div class="container"> 
        <p class="display-4" id="headertext">My Secret Journal</p>
        <p id="subheading">Enter your email address to change your password!</p>
        <div id="error"><?php echo $error; ?></div>
        <form method=post>
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <button  type="submit" id="save" class="btn btn-primary logout">Submit</button><br>
            <a href="index1.php">Go Back to Log In page</a>
            <a href="index.php" style="border:none !important;">Register/Sign Up</a>
        </form>
        </div>
        <script src="httpos://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script type="text/javascript">
            
            
            
        </script>
      </body>
</html>