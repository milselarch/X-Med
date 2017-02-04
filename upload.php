<?php
require 'session.php';

$medicine = $_SESSION["medicineName"];
$username = $_SESSION['login_user'];
$db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

$target_dir = "images/";
$ext = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dir . basename(hash('ripemd160', $medicine));
$target_file_ext = $target_file . ".$ext";
error_log($target_file);

$uploadOk = 1;
$imageFileType = pathinfo($target_file_ext, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    
    if ($check !== false) {
        error_log("File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
        error_log("File is not an image.");
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    error_log("Sorry, your file is too large.");
    $uploadOk = 0;
}

/*
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
*/

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    error_log("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    error_log("Sorry, your file was not uploaded.");
    
} else {
    // if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_ext)) {
        $stmt = $db->prepare("
        INSERT INTO imagePaths (id, name, ext) VALUES (:path, :medicine, :ext) 
        ON DUPLICATE KEY UPDATE ext = :ext;
        ");
        
        $stmt->execute(
            array(":medicine" => $medicine, ":path" => $target_file, ":ext" => $ext)
        );
        
        error_log("The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.");
    } else {
        error_log("Sorry, there was an error uploading your file.");
    }
}

header('location: picture.php');
