<style>
    div#gallery {
        background-color: white; 
        display: inline-flex;
    } div#gallery img {
        display: inline-block;
    }

    div#galleryWrapper {
        overflow-x: hidden;
        margin-bottom: 2rem;
        width: 100%; 
    }
    
    div#gWidget {
        display: flex;
        
    } div#gWidget button.gallery {
        height: 100px;
        font-family: 'Dosis', sans-serif;
        font-size: 2rem;
        /* margin-top: 0.5rem; */
        background-color: #6699FF; 
        color: white;
        border: 0 none;
        border-width: 0;
        padding: 1rem;
        
    } div#gWidget button.gallery:hover {
        background: #4a8bec;
    }
    
</style>
  
<script>
$(document).ready(function () {
    console.log(22);
    offset = 0;
    
    //var offset = $('div#galleryWrapper').scrollLeft();
    
    $("button.gallery#leftBttn")
        .mousedown(function () { offset = -1; })
        .mouseup(function () { offset = 0; })
    
    $("button.gallery#rightBttn")
        .mousedown(function () { offset = 1; })
        .mouseup(function () { offset = 0; })

    function scroll () {
        var offsetNow = $('div#galleryWrapper').scrollLeft();
        $('div#galleryWrapper').scrollLeft(offsetNow + offset*3);
        setTimeout(scroll, 2);
    }
    
    scroll();
})

</script>
   

<div id="gWidget">
    <button class='gallery' id="leftBttn">&#9668;</button>
    
    <div id="galleryWrapper">
        <div id="gallery">
        <?php
            $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

            $stmt = $db->prepare("select id, ext from imagePaths order by rand() limit 20");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $path = $row["id"];
                $ext = $row["ext"];
                $fullpath = "$path.$ext";

                echo "<img width=100px height=100px src='$fullpath'/>";
            }
        ?>
        </div>
    </div>
    
    <button class='gallery' id="rightBttn">&#9658;</button>
</div>