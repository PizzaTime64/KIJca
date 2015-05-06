<?php
include('createCsr2Back.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Certificate Sign Request</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

</head>

<body>

    <div id="wrapper">

        <?php include "menu.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <h3> Add Certificate Sign Request</h3>
                    <form class="form-horizontal" action="" method="post">

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="country" placeholder="2 letter code [AU] ">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="state" placeholder="State or Province Name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Locality</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="locality" placeholder="eg, city">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Organization</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="org" placeholder="eg, company">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Organization Unit</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="orgUnit" placeholder="eg, section">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="name" placeholder="Your Name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Public Key</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="pubkey" placeholder="Public Key"></textarea>
                        </div> 
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button name="submit" type="submit" value="Submit" class="btn btn-default">Create</button>
                        </div>
                      </div>
                    </form>
                </form>
            <?php echo $msg; ?>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
