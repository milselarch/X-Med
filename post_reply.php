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
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    
    <body>
        <div id='wrapper'>
            <h2>Log in to Forum</h2>
            <p>Creating login functionality</p>
            <?php
            echo "<p>You are logged in as " . $_SESSION['login_user'] . "&bull; <a href='logout.php'>Logout</a>";
            ?>
        <hr/>
        
        <div id="content">
            <form action="post_reply_parse.php" method="post">
                <p>Reply Content</p>
                <textarea name ="reply_content" rows="5" cols="75"></textarea>
                <br /><br />
                <input type="hidden" name="cid" value="<?php echo $cid;?>"/>
                <input type="hidden" name="tid" value="<?php echo $tid;?>"/>
                <input type="submit" name="reply_submit" value="Post Your Reply"/> 
            </form>
          
        </div>
        </div>
       
    </body>
</html>