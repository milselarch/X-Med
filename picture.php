<?php
require "session.php";
$userType = $_SESSION["user_type"];

if (isset($_GET["medicineName"])) {
    $medicine = $_GET["medicineName"];
    
} elseif (isset($_SESSION["medicineName"])) {
    $medicine = $_SESSION["medicineName"];
    unset($_SESSION["medicineName"]);
};

$username = $_SESSION['login_user'];
$db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

$target_dir = "images/";
$stmt = $db->prepare("select id, ext from imagePaths where name = :medicine");
$stmt->execute(array(":medicine" => $medicine));
$result = $stmt->fetchAll();

if ($stmt->rowCount() == 0) {
    $path = 'http://downloadicons.net/sites/default/files/question-icon-80125.png';
    //'https://i.ytimg.com/vi/S40r0jGT1cQ/maxresdefault.jpg';
} else {
    $path = $result[0]['id'] . "." . $result[0]['ext'] . "?timestamp=" . time();
}
?>
   
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
        <script>
            $(document).ready(function () {
                //images/1aece81dd38b101f465d725a6d292e22c71a0f3c.png
                console.log("IMG HEIGHT", $(this).width());
                $('img#mainImage').height($(this).width());
                
                <?php 
                if ($userType == 'admin' or $userType == 'staff') {
                    echo ("
                    $('img#mainImage').click(function () {
                        //console.log('CLICKED IMGE');
                        $('input[name=fileToUpload]').trigger('click');
                        //$('#mainForm').submit();
                    });

                    $('input:file').change(function(e) {
                        console.log('file selected.', $(this).val());
                        $('input:submit').trigger('click');
                    });");
                }
                ?>
            });
        </script>
        
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="picture.css">
    </head>
    
    <body>
        <form id="mainForm" action="upload.php" method="post" enctype="multipart/form-data">
            <img id="mainImage" src='<?= $path; ?>' />
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            <input type="text" value='<?= $medicine ?>' name="medicineName">
        </form>
        
    </body>
</html>