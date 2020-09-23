<?php
    
    session_start();
    
    include("connect.php");
    
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
            
            } else {
                
                $error.="*The email ID you entered is not registered. Please click the register button below to sign up.";
                
            }
            
        } else {
            
            $error.="*Something is wrong. Please try again later";
    
        }
        
    }

    $query1="SELECT `question` FROM `Signup` where Email='".mysqli_real_escape_string($link,$_SESSION['emailid'])."'";
    
    if($result1=mysqli_query($link,$query1)) {
        
        $row2=mysqli_fetch_array($result1);
     
            //echo $row[0];
        
    }
    
    if($_POST) {
        
        $error1="";
        
        $question=$_POST['question'];
        
        $query2="SELECT `keytoq` FROM `Signup` where Email='".mysqli_real_escape_string($link,$_SESSION['emailid'])."'";
        
        if($result2=mysqli_query($link,$query)) {
            
            $row1=mysqli_fetch_array($result);
            
            //echo $row1[0];
            
            if($row1[0]==$question) {
                
                header("Location:password.php");
                
            } else {
                
                $error1.="*Wrong answer. Please try again.";
                
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
            
            .subheading{
                
                color:green;
                text-align:center;
                text-shadow: -1px -1px 0 yellow, 1px -1px 0 yellow, -1px 1px 0 yellow, 1px 1px 0 yellow;
                font-size:20px;
                
            }
            
            .error{
                
                color:red;
                text-align:center;
                font-size:18px;
                
            }
            
            a{
                
                border-right:1px solid grey;
                padding-right:5px;
                
            }
            
            #queswer{
                
                display:none;
                
            }
            
        </style>
        
    </head>
    <body>
        <div class="container"> 
            <p class="display-4" id="headertext">My Secret Journal</p>
            <div id="getemail">
                <p class="subheading">Enter your email address to change your password!</p>
                <div class="error"><?php echo $error; ?></div>
                <form method=post>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <input  type="submit" id="save" class="btn btn-primary logout" value"submit"><br>
                    <a href="index1.php">Go Back to Log In page</a>
                    <a href="index.php" style="border:none !important;">Register/Sign Up</a>
                </form>
            </div>
            <div id="queswer">
                <p class="subheading">Please answer the following security question to change your password!</p>
                <div class="error"><?php echo $error1; ?></div>
                <form method=post>
                    <div class="form-group">
                        <label for="question"><?php echo $row2[0]; ?></label>
                        <input name="question" type="text" class="form-control" id="question">
                    </div>
                    <button  type="submit" id="save1" class="btn btn-primary logout">Submit</button>
                    <a href="index1.php">Go Back to Log In page</a>
                </form>
            </div>    
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script type="text/javascript">
            
            $("#save").submit(function(){
                alert("hi");
            });
            
        </script>
      </body>
</html>