<?php
    
    include("connect.php");

    if($_COOKIE['Email']) {
        
        $query = "SELECT `Name` FROM `Signup` WHERE email = '".mysqli_real_escape_string($link, $_COOKIE['Email'])."'";
            
        if($result=mysqli_query($link,$query)) {
       
            $row = mysqli_fetch_array($result);
       
            $name = $row[0];
        
        }
        
        $query = "SELECT Textarea FROM `Signup` WHERE Email = '".mysqli_real_escape_string($link,$_COOKIE['Email'])."'";
    $result=mysqli_query($link,$query);
    if($result){
        $row = mysqli_fetch_array($result);
        $content = $row[0];
    }
        
    } else {
        
        header("Location:index.php");
        
    }
    
    
        //echo $_GET['logoutt'];
    
    if($_GET) {
        
        if($_GET['logoutt'] == "") {
            
            setcookie ("Email" , "" , time() - 60 * 60 * 48);
            
            header("Location:index1.php");
            
        }
        
    }
    
    $email=$_COOKIE['Email'];
    
    if($_POST) {
        
        $query="UPDATE `Signup` SET textarea='".mysqli_real_escape_string($link,$_POST['textarea'])."' WHERE email='".mysqli_real_escape_string($link,$email)."'";
        mysqli_query($link,$query);
        //echo $_POST['textarea'];
        /*$query = "SELECT * FROM `Signup` WHERE email='".mysqli_real_escape_string($link,$email)."'";
        if($result=mysqli_query($link,$query)){
            $row=mysqli_fetch_array($result);
            print_r ($row);
        }*/
        
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
            
            #welcome{
                
                color:green;
                text-align:center;
                text-shadow: -1px -1px 0 yellow, 1px -1px 0 yellow, -1px 1px 0 yellow, 1px 1px 0 yellow;
                font-size:20px;
                //clear:both;
                
            }
            
            .logout{
                
                float:right;
                text-align:center;
                border:1px solid black;
                border-radius:5px;
                background:#F0D1A4;
                color:black;
                font-weight:bold;
                margin:10px;
                
            }
            
            textarea {
                
                outline:none;
                resize:none;
                
                
            }
            
            #date{
                
                color:red;
                text-decoration:underline;
                font-size:18px;
                
            }
            
            #saved{
                
                color:green;
                padding:5px;
                text-align:center;
                
            }
            
        </style>
        
    </head>
    <body>
        <div class="container"> 
        <p class="display-4" id="headertext">My Secret Journal</p>
        <form>
            <button name="logoutt" class="logout button">Log Out</button>
        </form>
        <p id="welcome"><?php echo"Welcome ".$name." !"; ?></P>
        <div id="saved"></div>
        <form method=post>
            <div class="form-group">
                <button id="save" class="logout button">Save</button>
                <label for="textarea"><p id="date">Hello</p></label>
                <textarea class="form-control" id="textarea" name="textarea" rows="30"><?php echo $content;?></textarea>
            </div>
        </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script type="text/javascript">
            
            var date = String(new Date().getDate());
            var month = String(new Date().getMonth());
            if (month == 0 ) { month = "JAN"; }
            if (month == 1 ) { month = "FEB"; }
            if (month == 2 ) { month = "MAR"; }
            if (month == 3 ) { month = "APR"; }
            if (month == 4 ) { month = "MAY"; }
            if (month == 5 ) { month = "JUN"; }
            if (month == 6 ) { month = "JULY"; }
            if (month == 7 ) { month = "AUG"; }
            if (month == 8 ) { month = "SEPT"; }
            if (month == 9 ) { month = "OCT"; }
            if (month == 10 ) { month = "NOV"; }
            if (month == 11 ) { month = "DEC"; }
            var day = String(new Date().getDay());
            if (day == 0) { day = "Sunday"; }
            if (day == 1) { day = "Monday"; }
            if (day == 2) { day = "Tuesday"; }
            if (day == 3) { day = "Wednesday"; }
            if (day == 4) { day = "Thursday"; }
            if (day == 5) { day = "Friday"; }
            if (day == 6) { day = "Saturday"; }
            ($('#date').html(date + "th " + month +" , "+ day)); 
            $('#save').click(function() {
                
                $('#saved').html("Your works have been successfully saved.");
                //var text=$('#textarea').html();
                //$('#textarea').html(text);
            
            });
            
        </script>
      </body>
</html>