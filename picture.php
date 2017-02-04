<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    
        <script src="iframe-resizer/js/iframeResizer.contentWindow.js"></script>
        <link rel="stylesheet" type="text/css" href="picture.css">
        
        <script>
            $(document).ready(function () {
                console.log("IWIDTH", $(this).width());
                $('img#mainImage').height($(this).width());
                
                $('img#mainImage').click(function () {
                    console.log("CLICKED IMGE");
                    $("input[name='fileToUpload']").trigger('click');
                });
            });
        
        </script>
    </head>
    
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <img id="mainImage" src='https://i.ytimg.com/vi/S40r0jGT1cQ/maxresdefault.jpg'/>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
        
    </body>
</html>