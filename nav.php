<?php 
session_start();
$userType = $_SESSION["user_type"];

?>

<html>
    <head>
        <title>Example</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.php"><img src="logo.png" alt="" style='height:22px'></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    
                    <?php
                        if (isset($_SESSION["login_user"])) {
                            echo "<ul class='nav navbar-nav'>
                            <li id='nav_medicine'><a href='medicine.php'>Medicines</a></li>
                            </ul>";
                            echo "<ul class='nav navbar-nav'>
                            <li id='nav_medicine'><a href='forum.php'>Forum</a></li>
                            </ul>";
                        }
                    ?>
                    
                    <ul class="nav navbar-nav">
                        <li id="nav_medicine"><a href="aboutus.php">About Us</a></li>
                    </ul>
                    
                    <ul class="nav navbar-nav">
                        <li id="nav_medicine"><a href="contactus.php">Contact Us</a></li>
                    </ul>

                    <!--
                    <form class="navbar-form navbar-left" action="externalSearch.php">
                        <button type="submit" class="btn btn-default">External Search</button>
                    </form>
                    -->
                    

                    <ul class="nav navbar-nav navbar-right" action="options.php">
                        <!--
                        <li>
                            <a href="#" id="nav_account">
                            test
                            </a>
                        </li>
                        -->
                        

                        <li class="dropdown">
                                <?php 
                                    if (isset($_SESSION['login_user'])) {
                                        echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>";
                                        echo $_SESSION['login_user'];
                                        echo "&nbsp<span class='caret'></span></a>";
                                    };
                                    
                                ?> 

                                <?php 
                                    if (isset($_SESSION['login_user'])) {
                                        echo "<ul class='dropdown-menu'>";
                                        echo "<li><a href='feedback.php'>feedback</a></li>";
                                        if ($userType == 'admin') {
                                            echo "<li><a href='users.php'>view users</a></li>";
                                        }

                                        echo "<li><a href='logout.php'>log out</a></li>";
                                    }
                                
                                    if (!isset($_SESSION['login_user'])) {
                                        echo "</ul>";
                                        
                                        if ($_SERVER['REQUEST_URI'] == "/X-Med/index.php" || $_SERVER['REQUEST_URI'] == "/X-Med/") {
                                            echo "
                                            <form class='navbar-form me-right' method='POST' action='login.php'>
                                                <div class='form-group'> 
                                                    <input type='text' name='username' placeholder='username'  class='form-control'>
                                                </div>

                                                <div class='form-group'>
                                                    <input type='password' name='password' placeholder='password' class='form-control' required>
                                                </div>
                                                
                                                <style>
                                                    button.login {
                                                        padding-top: 0.4rem;
                                                        padding-bottom: 0.4rem;
                                                    }
                                                </style>

                                                <button class='login' name='submit' type='submit'>Login</button>
                                                <button class='login' name='register' type='submit'>Register</button> 
                                            </form>";
                                        
                                        }
                                        
                                    
                                        
                                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                            $user = $_POST['username'];
                                            $pword = $_POST['password'];
                                           // echo $user;
                                            //echo "<br>".$password;
                                            $badlogin = "";
                                            echo $badlogin;

                                            $servername = "localhost";
                                            $username = "webuser";
                                            $password = "password";
                                            $dbname = "X_Med";
                                            // $user=$_POST['username'];
                                            // $pword=$_POST['password'];
                                            // $checkpword=$_POST['confirmpass'];
                                            // $user=$_SESSION["Username"];
                                            // $pword=$_SESSION["password"];



                                             //=======================================================
                                            // Check connection
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            //====================================================================
                                            $sql = "SELECT Username,Password FROM users";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    if (($row["Username"]==$user)&&($row["Password"]!=$pword)) {
                                                        $badlogin="* Wrong password!";
                                                        break;

                                                    } else if(($row["Username"]==$user)&&($row["Password"]==$pword)){
                                                        $success= "Login Successful!";
                                                        $badlogin="";
                                                        break;
                                                    } else {
                                                        $badlogin="No user account is found.";
                                                    }
                                                }
                                            }

                                        $conn->close();
                                    }
                                }
                            
                        
                                ?>
                
                                <!--
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                -->
                        </li>
                    </ul>
                    
                    
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </body>
</html>