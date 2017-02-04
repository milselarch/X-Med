<?php
require 'session.php';
if (isset($_GET['medicineName'])) {
    $_SESSION['medicineName'] = $_GET['medicineName'];
}

$medicine = $_SESSION["medicineName"];
$username = $_SESSION['login_user'];
$db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

$target_dir = "images/";
$stmt = $db->prepare("select id, ext from imagePaths where name = :medicine");
$stmt->execute(array(":medicine" => $medicine));
$result = $stmt->fetchAll();

if ($stmt->rowCount() == 0) {
    $path = 'https://cdn3.iconfinder.com/data/icons/wpzoom-developer-icon-set/500/100-512.png';
    //'https://i.ytimg.com/vi/S40r0jGT1cQ/maxresdefault.jpg';
} else {
    $path = $result[0]['id'] . "." . $result[0]['ext'];
}
?>
   
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="picture.css">
        
        <script>
            $(document).ready(function () {
                console.log("IWIDTH", $(this).width());
                $('img#mainImage').height($(this).width());
                
                $('img#mainImage').click(function () {
                    console.log("CLICKED IMGE");
                    $("input[name='fileToUpload']").trigger('click');
                    //$('#mainForm').submit();
                });
                
                $('input:file').change(function(e) {
                    console.log('file selected.');
                    $('input:submit').trigger('click');
                });
            });
        
        </script>
    </head>
    
    <body>
        <form id="mainForm" action="upload.php" method="post" enctype="multipart/form-data">
            <img id="mainImage" src=<?= json_encode($path); ?> />
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
        
    </body>
</html>