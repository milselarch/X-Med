<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?PHP 

$type="";
$useremail=$userid= "";
    $customername="";


?>





<link rel="icon" href="favicon.ico">
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="jumbotron.css" rel="stylesheet">
<nav class="navbar navbar-default" >
      <div class="container" style='color: red;'>
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="main.php">X-MED</a>
        </div>
          <div id="navbar" class="collapse navbar-collapse" style="color: royalblue;">
          <ul class="nav navbar-nav">
              <li ><a href="main.php">Home</a></li>
              <li><a href="aboutus.php">About</a></li>
            <li class="active"><a href="#">Contact</a></li>
            
          </ul>
          </div>
</nav>
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us <small>Have a little question? Tell us!</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Name</label>
                                <input type="text" name="customeruser" class="form-control" id="name" placeholder="Enter name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email" class="form-control" name="customeremail" id="email" placeholder="Enter email" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject</label>
                                <select id="subject" class="form-control" name="type" required="required">
                                    <option value="na" selected="">Choose One:</option>
                                    <option value="service">General Customer Service</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Product Support</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Message</label>
                                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                          placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                Send Feedback</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
                <address>
                    <strong>X-MED</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">
                        P:</abbr>
                    (+65) 9709 3827
                </address>
                <address>
                    <strong>Full Name</strong><br>
                    <a href="mailto:charlotte.limwt@gmail.com">support.xmed@gmail.com</a>
                </address>
            </form>
        </div>
    </div>
</div>

<?PHP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];  // Storing Selected Value In Variable
   
    $useremail= $_POST['customeremail'];
    $customername= $_POST['customeruser'];
    $comments=$_POST['message'];
    $event="Your feedback has been submitted. Thank You!";
    echo "<div class='eventcolor' >".$event."</div>";
    
    
    
    //=======DATABASE=================
    
    
    
    
    
    $servername = "localhost";
        $username = "webuser";
        $password = "password";
        $dbname = "X_Med";
      
        
         
         //=======================================================
        // Check connection
        
        
        
        $conne = new mysqli($servername, $username, $password, $dbname);
        if ($conne->connect_error) {
            die("Error connecting " . $conne->connect_error);
        }
        //INSERT INTO `feedback`(`name`, `email`, `type`, `message`, `ID`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
//==============================================================================================================
        
        $idcheck="SELECT ID FROM feedback WHERE 1 ";
        $result = $conne->query($idcheck);

        if ($result->num_rows > 0) {
            // output data of each row
        while($row = $result->fetch_assoc()) {
        $userid= $row["ID"];
       
        }
        } 
        
        $userid=$userid+1;
        
       // echo $ID;
        
        
        
        
        
        
        
        
        
        //======================insert the data==============================
     $sql = "INSERT INTO feedback (name,email,type,message,ID)VALUES ('".$customername."','".$useremail."', '".$type."', '".$comments."', '".$userid."')";

        if ($conne->query($sql) === TRUE) {
       // echo "New record created successfully";
        } else {
        echo "Message not sent" . $sql . "<br>" . $conne->error;
}
        //debugging purpose
        
        $conne->close();
    
    
    
    
    
    
    
    
}










?>
