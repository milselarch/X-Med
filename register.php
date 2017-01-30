<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<html lang="english">
    <head>
        
        <title> Html5 Lab Test</title>
        <style>
        </style>
    </head>
    <body>
        <h2> Hello<h2/>
        <?php
        /*
        session_unset(); 
        session_destroy(); 
        
       
        $warning="";
        
        session_start();*/
        // put your code here
        ?>
    </body>
</html> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <div class="navbar navbar-inverse navbar-static-top">
 
 <div class="container">
 
     <a href="main.php" class="navbar-brand">X-MED </a> <button class="navbar-toggle"
      data-toggle="collapse" data-target=".navHeaderCollapse"></button>

      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav navbar-left">
            <li><a href="main.php">Home</a></li>

            <li><a href="aboutus.php">About</a></li>

              <li><a href="contactus.php">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      
      
      <?php
      
     $pass=$user=$warning=$email=$name=$mail="";
     $confirmpass=$same="";
     $ID=0;
   /* if($_SESSION["same"]!="Same Username!"){
        $same="";
    }
        else
    {*/
   
    
     
    ?>

      <div class="container" >

        <form class="form-signin"  method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <h2 class="form-signin-heading">Register</h2>
        
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" id="inputEmail" name="name" class="form-control" placeholder="Name" required autofocus>
        
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
        
        <label for="inputEmail" class="sr-only">Mail</label>
        <input type="text" id="inputEmail" name="mail" class="form-control" placeholder="Mailing address" required autofocus>
        
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"  required>
        <label for="inputcomfirmPassword" class="sr-only">Confirm Password</label>
        <input type="password" id="inputPassword" name="confirmpass"class="form-control" placeholder="Comfirm Password"  required>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Register</button>
        
      </form>

    </div> <!-- /container -->
    
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"&& isset( $_POST['submit'] )){
        $pass=$_POST["password"];
             $confirmpass=$_POST["confirmpass"];
             $user=$_POST["username"];
             $name=$_POST["name"];
             $email=$_POST["email"];
             $mail=$_POST["mail"];
       
   
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
        //=====  CHECK EXSITING USERNAME======
        $checkuser="SELECT Username FROM userdatabase WHERE 1 ";
        $result = $conn->query($checkuser);

        if ($result->num_rows > 0) {
            // output data of each row
        while($row = $result->fetch_assoc()) {
        $o= $row["Username"];
        if($o==$user){
            $same="*Username already exist!";
        }
        }
        } 

       //  $conn->close();
         //====================================================================
        
        
        //===========================================================
        
        

        
        
        //==================================INSERTING DATA===================================================
        if($same==""&&$pass==$confirmpass){
            
            //=======================get current id=======================
        
         $checkuser="SELECT ID FROM userdatabase WHERE 1 ";
        $result = $conn->query($checkuser);
        

        if ($result->num_rows > 0) {
            // output data of each row
        while($row = $result->fetch_assoc()) {
        $k = $row["ID"];
       // echo $k."<br>";
        if($k>=$ID){
            $ID=$k;
         //   echo $ID."<br>";
        }
       
        }
        } 
        
        $ID=$ID+1;
        //===========================================================
     
            
        $sql = "INSERT INTO userdatabase (ID,Username, Password, name,email,address)VALUES ('".$ID."','".$user."', '".$pass."', '".$name."', '".$email."', '".$mail."')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}
        //debugging purpose
       // echo "<br><br>"."<br>Username:".$user."<br>Password:".$pass."<br>Name:".$name."<br>Email:".$email."<br>Mail:".$mail;
        $conn->close();
        
        
        header("Location: successfulregister.php");
        exit;
        
        
        }
        else if ($same=="*Username already exist!"){
             echo "<br><span style='color: red;'>".$same."</span>";
        }
        else if($pass!=$confirmpass)
        {
            $same="";
            $warning="*The password is not the same";
        echo "<br><span style='color: red;'>".$warning."</span>";
        }
            
        
        }
        //=============================================================================
      
        
       
    
    ?>

    
    
    
    
    


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
