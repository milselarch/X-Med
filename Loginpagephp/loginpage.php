<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
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
            $badlogin="Wrong password!";
            break;
            
        }    
        else if(($row["Username"]==$user)&&($row["Password"]==$pword)){
            echo "Login Successful!";
            $badlogin="";
            break;
        }
        else{
        $badlogin="No user account is found.";}
       }
        }
        
        $conn->close();
        
        
        
        echo $badlogin;
        ?>
        
        
        
        
    </body>
</html>
<?php
        
        
        ?>
