<?php
    require 'session.php';
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
            <img id="mainImage" src='https://i.ytimg.com/vi/S40r0jGT1cQ/maxresdefault.jpg'/>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
        
    </body>
</html>