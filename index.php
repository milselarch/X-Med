<!DOCTYPE html>
<?php 
session_start();
?>

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

    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="stylesheet.css" rel="stylesheet">

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
        <div class='centered'>
            <?php 
        require 'nav.php';  
    ?>
    
    
  <?PHP echo "<div style='text-align: right; color:red;'>".$badlogin."</div>";
       echo "<div style='text-align: right; color:blue;'>".$success."</div>"
  ?>
    <div class="container">
     
    <?php require 'gallery.php' ?>
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle Menu</button>
          </p>
          <div class="jumbotron" >
            <iframe src="//cdn.bannersnack.com/banners/bxcj29pnb/embed/index.html?userId=27254551&t=1486138227" width="468" height="60" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true"></iframe>
           
            <h1 style="font-family: 'Roboto slab'">Welcome to X-MED</h1>
            <p style="color: grey; font-weight: bold ">Share . Discover . Discuss</p>
          </div>
          
          
          <p style="font-size: 1cm">Newest Medicines</p>
          <div class="row">
            
            <?php
            $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

            $stmt = $db->prepare("select name, instructions from medicine order by timestamp DESC limit 6");
            $stmt->execute();
      
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $name = $row["name"];
                $instructions = $row["instructions"];
                
                if (strlen($instructions) > 100) {
                    $instructions = substr($instructions, 0, 140) . "...";
                } else {
                    $instructions = str_pad($instructions, 100-strlen($instructions), " ");
                }
                
                echo "<div class='col-xs-6 col-lg-4'";
                echo "<h2><b style='font-size: 2rem'>$name</b></h2>";
                echo "<p style='font-size: 1.5rem; font-family: open sans'>$instructions</p>";
                echo "</div><!--/.col-xs-6.col-lg-4-->";
            }
            ?>
                  
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
 
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
              <a href="#" class="list-group-item active">Navigation</a>
                <a href='newpage.php' class="list-group-item">NEWS</a>
                
                <?php
                    $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
                    $stmt = $db->prepare("select annoucement from annoucement");
                    $stmt->execute();
                    
                    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $ann = htmlspecialchars($row['annoucement']);
                        echo "<p class='list-group-item' style='white-space: pre-wrap'><b>Annoucements:</b><br/>{$ann}</p>";
                    }

                ?>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p style='color: grey;'>&copy; Made by Charles, Charlotte and KK. Give us all the CSAD marks pls</p>
        <br/>
      </footer>

    </div><!--/.container-->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
    
            
        </div>
  </body>
</html>

