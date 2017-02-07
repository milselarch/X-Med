<!DOCTYPE html>
<?php
session_start();
if (isset($_POST["submit"])) {
    $_SESSION['news-submit'] = $_POST['submit'];
    $_SESSION['news-name'] = $_POST['name'];
    $_SESSION['news-data'] = $_POST['data'];
    
    error_log("REPOST");
    header('Location: ' . $_SERVER['REQUEST_URI']);
};

?>


<head>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <link rel="icon" href="favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="stylesheet.css" rel="stylesheet">
    <link href="newcss.css" rel="stylesheet">
    
    <script src="script.js"></script>
    
    <style>
        .news {
            font-family: 'Inconsolata';
        } button.news {
            font-weight: 700;
        }
        
        textarea {
            font-family: 'Inconsolata';
        }
        
        hr.news {
            height: 1rem;
            width: 100%;
            border-top: 5px solid #abe;
        }
        
        p.news {
            font-family: open sans;
            font-size: 1.6rem;
        }
        
        b.news {
            font-size: 2.4rem;
        }
    </style>
</head>

<body>
    <div class='centered'>
        <?php 
            require 'nav.php';
            //if it is the news database being added
            
            //echo "<p>" . $_SESSION['userType'] . "</p>";
            session_start();
        
            if (!isset($_SESSION['user_type']) or $userType == 'user') {
                $inline = 'width: 100%';
            } else {
                $inline = '';
            }
        ?>
        
        <div id="searchTable" style='<?= $inline ?>'>
            <?php
                /*
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION); 
                */

                $servername = "localhost";
                $username = "webuser";
                $password = "password";
                $dbname = "X_Med";

                //=======================================================
                // Check connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                if (isset($_SESSION['news-submit'])) {
                    $title = $_SESSION["news-name"];
                    $data = $_SESSION["news-data"];
                    
                    unset($_SESSION['news-submit']);
                    unset($_SESSION["news-name"]);
                    unset($_SESSION["news-data"]);

                    $servername = "localhost";
                    $username = "webuser";
                    $password = "password";
                    $dbname = "X_Med";
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

                    $sql = "INSERT INTO `news` (`title`, `data`) VALUES ('{$title}','{$data}')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<h3 class='news'> Your news have been added. Refresh the page to see the news </h3>";
                    } else {
                        echo "<h3 class='news'> Error: " . $sql . "<br>" . $conn->error . "</h3>";
                    }
                    
                    unset($_POST['submit']);
                }
             
                if (!isset($_SESSION['user_type']) or $userType == 'user') {
                    $sql = "select annoucement from annoucement";
                    $result = $conn->query($sql);
                    
                    if ($row = $result->fetch_assoc()) {
                        $ann = htmlspecialchars($row['annoucement']);
                        echo "<thead><p style='white-space: pre-wrap' class='news'><b class='news'>Annoucements:</b><br/>$ann</p></thead></thead>";
                        
                        echo "<hr class='news'/>";
                    }
                }

                $sql = "SELECT time, title, data FROM news ORDER BY time DESC";
                $result = $conn->query($sql);            
                echo "<table><b class='news'>News:</b><tbody>";
            
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // echo "id: " . $row["time"]. " - Name: " . $row["title"]. " " . $row["data"]." ".$row["pictures"] ." ". "<br>";
                        //if its at the latest
                        //data1
                        $timestamp = $row["time"];
                        $data = $row["data"];
                        $title = $row["title"];
                        
                        echo "<tr>";
                        echo "$timestamp<br/><b>$title</b>$data";
                        echo "</tr><br/><br/>";
                    }
                }
                
                echo "</table></tbody>";
            ?>
        </div>
       
       
        <?php if ($userType == 'admin' or $userType == 'staff') { ?>
            <div id="formDiv">
                <!-- -------------------------------------------------------------------------------------------3 Latest news------------------------------------------------------------------------------------------ --> 
                <!-- This will show if the user is admin -->
                <h2 class='news'>NEWS</h2>
                <form class="form-signin"  method="POST" enctype="multipart/form-data" action="">
                    <!-- This form is to add the news portion-->
                    <label for="inputEmail" class="sr-only">Title</label>
                    <textarea rows=1 type="text" id="inputEmail" name="name" placeholder="title" required autofocus></textarea>
                    <br><br>
                    <label class="sr-only">News:</label>
                    <textarea placeholder="News text"name="data" rows="5" cols="100"></textarea>
                    <br><br>
                    <button class="btn btn-lg btn-primary news" name="submit" type="submit">submit</button>

                </form>
                
                <?php
                    if (isset($_POST['asubmit'])) {
                        $stmt = $conn->prepare("update annoucement set annoucement = ?");
                        $stmt->bind_param("s", $_POST["ann"]);
                        $stmt->execute();
                    }
    
                    $sql = "SELECT annoucement from annoucement limit 1";
                    $result = $conn->query($sql);      

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $annoucement = htmlspecialchars($row['annoucement']);
                    }
                ?>

                <!-- This part is to edit the announcement portion -->
                <form class="form-signin"  method="POST" action="">
                    <h2 class="form-signin-heading news">ANNOUNCEMENTS</h2>
                    <label class="sr-only news">News:</label>
                    
                    <textarea placeholder="News text" name="ann" rows="5" cols="50"><?= $annoucement ?></textarea>
                    
                    <br><br>
                    <button class="btn btn-lg btn-primary news" name="asubmit" type="submit">submit</button>

                </form>
            </div>
        <?php } ?>
    </div>
</body>

