<!DOCTYPE html>
<html lang="en">
  <head>
      <style>
          
          .me-right{
              float: right !important;
             margin-right: 20px;
          }
      </style>
      <?PHP  $badlogin=$success=""; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Off Canvas Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse" >
      <div class="container" style='color: red;'>
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">X-MED</a>
        </div>
          <div id="navbar" class="collapse navbar-collapse" style="color: royalblue;">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact</a></li>
            
          </ul>
              
              
               <!-- /====================================================================================
               //
               //                               NOTE TO CODER:
               //                        Change the action of the form to loginpage.php
               //                   for login to be directed to another page instead of this
               //
               //
               //==========================================================================================
               -->
                 
            <form class="navbar-form me-right" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <div class="form-group"> 
                <input type="text" name="username" placeholder="username"  class="form-control ">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="password" class="form-control" required>
            </div>
                <button type="submit" name="submit">Login</button>
          </form>
               
               
               
               
               
              <?php
               if ($_SERVER["REQUEST_METHOD"] == "POST"&& isset( $_POST['submit'] )){
        $user=$_POST['username'];
        $pword=$_POST['password'];
       // echo $user;
        //echo "<br>".$password;
        $badlogin="";
        echo $badlogin;
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "logintest";
       // $user=$_POST['username'];
         //$pword=$_POST['password'];
        // $checkpword=$_POST['confirmpass'];
        //$user=$_SESSION["Username"];
      //  $pword=$_SESSION["password"];
         
        
         
         //=======================================================
        // Check connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
       
        
        //====================================================================
        $sql = "SELECT Username,Password FROM userdatabase";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
     
        while($row = $result->fetch_assoc()) {
        if(($row["Username"]==$user)&&($row["Password"]!=$pword)){
            $badlogin="* Wrong password!";
            break;
            
        }    
        else if(($row["Username"]==$user)&&($row["Password"]==$pword)){
            $success= "Login Successful!";
            $badlogin="";
            break;
        }
        else{
        $badlogin="No user account is found.";}
       }
        }
        
        $conn->close();
        
        
        
              }
        ?>
        
              
              <form style="position: absolute; right: 0; margin-top: 11px; margin-right: 4px;" method="POST" action="register.php">
                 <button type="submit">Register</button> 
                 
              </form>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
  <?PHP echo "<div style='text-align: right; color:red;'>".$badlogin."</div>";
       echo "<div style='text-align: right; color:blue;'>".$success."</div>"
  ?>
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle Menu</button>
          </p>
          <div class="jumbotron" >
            <h1>Welcome to X-MED</h1>
            <p style="color: grey; font-weight: bold ">Share . Discover . Discuss</p>
          </div>
          <p style="font-size: 1cm">Top Medicines</p>
          <div class="row">
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
 
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
              <a href="#" class="list-group-item active">Navigation</a>
            <a href="#" class="list-group-item">FORUM</a>
            <a href="newpage.php" class="list-group-item">NEWS</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p style='color: grey;'>&copy; Made by Charles, Charlotte and KK</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>

