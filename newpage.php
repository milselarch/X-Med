<!DOCTYPE html>
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

<!-- Custom styles for this template -->
<link href="newcss.css" rel="stylesheet">

<?PHP
//Getting the time stamp currently

$timestamp= date("dYGia");
?>






<?php
session_start();
//fetching news data

$data1 = $title1 = $title2 = $title3 = $data2 = $data3 = $data4 = $title4 = $data5 = $title5 = "";
$timestamp1 = $timestamp2 = $timestamp3 = $timestamp4 = $timestamp5 = $count = 0;
$picture1 = $picture2 = $picture3 = "";
$hold = 1; /*
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION); */


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
//===============================================================
if ($lol = $conn->query("SELECT time FROM news")) {

    /* determine number of rows result set */
    $count = $lol->num_rows;

    echo $count;

    /* close result set */
}



//$counting=mysql_query("SELECT count(*) FROM news");
// $count=mysql_fetch_assoc($counting);
// echo mysql_result($counting, 0);
//echo $count['total'];
// $result = mysql_query("SELECT count(*) from Students;");
//   echo mysql_result($result, 0);
//====================================================================
//=====  Select news to fill 3 different slots======


$sql = "SELECT time, title, data, pictures FROM news WHERE 1";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {


        // echo "id: " . $row["time"]. " - Name: " . $row["title"]. " " . $row["data"]." ".$row["pictures"] ." ". "<br>";
        //if its at the latest
        if ($hold == $count) {
            //data1
            $timestamp1 = $row["time"];
            $data1 = $row["data"];
            $title1 = $row["title"];
            $picture1 = $row["pictures"];
        }
        //data for second latest
        if ($hold == ($count - 1)) {
            $timestamp2 = $row["time"];
            $data2 = $row["data"];
            $title2 = $row["title"];
            $picture2 = $row["pictures"];
        }

        //data for third latest
        if ($hold == ($count - 2)) {
            //data3
            $timestamp3 = $row["time"];
            $data3 = $row["data"];
            $title3 = $row["title"];
            $picture3 = $row["pictures"];
        }

        //data for third latest
        if ($hold == ($count - 3)) {
            //data3
            $timestamp4 = $row["time"];
            $data4 = $row["data"];
            $title4 = $row["title"];
            $picture4 = $row["pictures"];
        }

        //data for third latest
        if ($hold == ($count - 4)) {
            //data3
            $timestamp5 = $row["time"];
            $data5 = $row["data"];
            $title5 = $row["title"];
            $picture5 = $row["pictures"];
        }




        $hold++;
    }
}
$conn->close();



echo $title1;
?>








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
<!-- -------------------------------------------------------------------------------------------3 Latest news------------------------------------------------------------------------------------------ --> 
<!-- This will show if the user is admin -->
<?PHP if ($_SESSION['userType'] != 'user') { //check if the person is admin  ?>

    <h2>WELCOME ADMIN!</h2>
    <p>Click to add the latest news and announcement</p>
    <form class="form-signin"  method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <!-- This form is to add the news portion-->
        <h2 class="form-signin-heading">NEWS UPDATE</h2>

        <label for="inputEmail" class="sr-only">Title</label>
        <input type="text" id="inputEmail" name="name" placeholder="title" required autofocus>
        <br>
        <br>
        <label class="sr-only">News:</label>
        <textarea placeholder="News text"name="data" rows="5" cols="100"></textarea>
        <br>
        <br>
        <button class="btn btn-lg btn-primary " name="submit" type="submit">submit</button>

    </form>

    <br><br>
    <!-- This part is to edit the announcement portion -->
    <form class="form-signin"  method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <h2 class="form-signin-heading">ANNOUNCEMENTS</h2>
        <br>
        <label class="sr-only">News:</label>
        <textarea placeholder="News text"name="ann" rows="5" cols="50" value="<?PHP echo $announ ?>"   ></textarea>
        <br>
        <button class="btn btn-lg btn-primary " name="asubmit" type="submit">submit</button>

    </form>
    <?php

//if it is the news database being added
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {




    $title = $_POST["name"];
    $data = $_POST["data"];
    /* $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
      $image_name = addslashes($_FILES['image']['name']); */
    $imgFile = $_FILES['fileToUpload']['name'];
    $tmp_dir = $_FILES['fileToUpload']['tmp_name'];
    $imgSize = $_FILES['fileToUpload']['size'];


    $upload_dir = 'uploads/'; // upload directory

    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    // rename uploading image
    $userpic = rand(1000, 1000000) . "." . $imgExt;

    // allow valid image file formats
    if (in_array($imgExt, $valid_extensions)) {
        // Check file size '5MB'
        if ($imgSize < 5000000) {
            move_uploaded_file($tmp_dir, $upload_dir . $userpic);
        } else {
            $errMSG = "Sorry, your file is too large.";
        }
    } else {
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }


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



    $sql = "INSERT INTO `news` (`time`, `title`, `data`,`pictures`) VALUES ('{$timestamp}', '{$title}','{$data}','{$userpic}')";
    if ($conn->query($sql) === TRUE) {
        echo "Your news have been added. Refresh the page to see the news";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//if its the announcement being changed (using notepad)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['asubmit'])) {
    $announ = $_POST["ann"];

    $myfile = fopen("announcement.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $announ);
    fclose($myfile);
}}
?>










</div>


</div> <!-- /container -->
