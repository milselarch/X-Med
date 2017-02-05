<?php
    require 'session.php';
    if ($_GET['cid'] == "") {
        header("Location: index.php");
    }

    $cid = $_GET['cid'];
    $tid = $_GET['tid'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Post Forum Reply</title>
        
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" type="text/css" href="forum.css"/>
    </head>
    
    <body>
        <div class="centered">
            <?php require 'nav.php' ?>
            
            <?php
            if (isset($_SESSION["MSSG"])) {
                echo $_SESSION["MSSG"];
                unset($_SESSION["MSSG"]);
            }
            ?>
            
            <div id='wrapper'>
               <h2 class='forum'>X-Med forums</h2>
               
                <div id="content">
                    <form action="post_reply_parse.php" method="post">
                        <p>Reply Content</p>
                        <textarea name ="reply_content" rows="5" cols="75"></textarea>
                        <input type="hidden" name="cid" value="<?php echo $cid;?>"/>
                        <input type="hidden" name="tid" value="<?php echo $tid;?>"/>
                        <input type="submit" name="reply_submit" value="Post Your Reply"/> 
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>