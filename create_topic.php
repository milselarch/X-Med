<?php
require 'session.php'; 
if ($_GET['cid'] == "") {
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
        
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
        <link rel="stylesheet" type="text/css" href="forum.css"/>
    </head>
    
    <body>
        <div class='centered'>
            <?php require 'nav.php'; ?>
            
            <div id='wrapper'>
                <h2 class='forum'>X-Med forums</h2>

                <hr/>
                <div id="content">
                    <form action="create_topic_parse.php" method="post">
                        <p>Topic Title</p>
                        <textarea type="text" name="topic_title" size="98" rows="1"></textarea>
                        <br/><br/>
                        
                        <p>Topic Content</p>
                        <textarea name="topic_content" rows="5" cols="75"></textarea>
                        <br /><br />
                        <input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
                        
                        <?php 
                            if (isset($_SESSION["MSSG"])) {
                                echo $_SESSION["MSSG"];
                                unset($_SESSION["MSSG"]);
                            }
                        ?>
                        
                        <input type="submit" name="topic_submit" value="Create Your Topic"/>
                    </form>
                </div>
            </div> 
        </div>
    </body>
</html>