<?
include('phpfile.php');
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>My Journal</title>
    
    <link rel="stylesheet" href="index.css">
  
  </head>
  <body>
    <div id="header">
    
        <p class="display-4" id="headertext">My Secret Journal</p>
    
    </div>
    <div class="container">
        
        <div id="signin">
            
            <p id="signuptext">Let's store our memories and thoughts!</p>
            <div id="error">
                <?php 
                    if($error) {
                        echo "<div class='alert alert-danger'><b>Alert!</b>".$error."</div>";
                    }
                ?>
            </div>
            <form>
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Rob Example">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="asdf@example.com">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="col-auto my-1">
                    <label class="col-form-label sr-only" for="select">Preference</label>
                    <select class="custom-select form-control" id="select" name="gender">
                        <option selected>I'm </option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <label class="col-form-label sr-only" for="selectt">Question</label>
                    <select name="gridRadios" class="custom-select form-control" id="selectt">
                        <option value="What's my favourite book?">What's my favourite book?</option>
                        <option value="What's the name of my first crush?">What's the name of my first crush?</option>
                        <option value="What is the name of my first best friend?">What is the name of my first best friend?</option>
                        <option value="What is the model of my first phone?">What is the model of my first phone?</option>
                        <option value="Who broke the trust first time in my life?">Who broke the trust first time in my life?</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="keytoq" class="col-sm-4 col-form-label">Answer</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="keytoq" name="keytoq">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5">Keep me logged in</div>
                    <div class="col-sm-7">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name = "loggedin" value="1" checked>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </div>
                <a href="index1.php">Log In</a>
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
