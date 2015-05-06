<?php
include('signupBack.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en"><meta style="visibility: hidden !important; display: block !important; width: 0px !important; height: 0px !important; border-style: none !important;"><embed id="__IDM__" type="application/x-idm-downloader" width="1" height="1" style="visibility: hidden !important; display: block !important; width: 1px !important; height: 1px !important; border-style: none !important; position: absolute !important; top: 0px !important; left: 0px !important;"></meta><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Signin Template for Bootstrap_files/ie-emulation-modes-warning.js"></script><style type="text/css"></style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-pinterest-extension-installed="cr1.37">

    <div class="container">
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <form action="" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input class="form-control" id="name" name="username" placeholder="username" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="**********" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Re enter password</label>
          <input type="password" class="form-control"id="repassword" name="repassword" placeholder="**********" placeholder="Password">
        </div>
        
        
        <button name="submit" type="submit" value=" Sign Up ">Sign Up</button>
      </form>
  </div>
   <span><?php echo $error;?></span>
  <div class="col-md-4"></div>
</div>
      

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Signin Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

</body></html>