<?php session_start();?>
<?php
 if((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")){
    header("Location: index.php");
    exit();
 }
 $cid = $_GET['cid'];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forum Topic</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <div id='wrapper'>
            <h2>Log in to Forum</h2>
            <p>Creating login functionality</P>
            <?php
            echo "<p>You are logged in as ".$_SESSION['username']."&bull; <a href='logout_parse.php'>Logout</a>";
            ?>
        <hr/>
        <div id="content">
            <form action="create_topic_parse.php" method="post">
                <p>Topic Title</p>
                <input type="text" name="topic_title" size="98" maxlength="150"/>
                <p>Topic Content</p>
                <textarea name="topic_content" rows="5" cols="75"></textarea>
                <br /><br />
                <input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
                <input type="submit" name="topic_submit" value="Create Your Topic"/>
            </form>
          
        </div>
        </div>
       
    </body>
</html>