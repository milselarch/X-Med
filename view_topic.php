<?php 
    require 'session.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Category</title>
        
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" type="text/css" href="forum.css"/>
    </head>
    <body>
        <div class='centered'>
            <?php require 'nav.php'; ?>
           
            <div id='wrapper'>
                <!--
                <h2 class='forum'>X-Med forums</h2>
                -->
                   
                <div id="content">
                    <?php
                    include_once("connect.php");
                    $uid = "";
                    $cid = $_GET['cid'];
                    $tid = $_GET['tid'];
                    $sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1"; 
                    $res = mysqli_query($con,$sql) or die(mysqli_error($con));
                    if (mysqli_num_rows($res) == 1){
                        echo "<table width='100%'>";
                        echo "<tr><td colspan='2'><input id='add_reply' class='forum' type='submit' value='Add Reply' onClick=\"window.location = 
                        'post_reply.php?cid=".$cid."&tid=".$tid."'\" />"; 

                        while($row = mysqli_fetch_assoc($res)){
                            $sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."' ORDER BY post_date DESC";
                            $res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));

                            while ($row2 = mysqli_fetch_assoc($res2)){
                                echo "<tr><td valign ='top'><div>".$row['topic_title']."<br/ >"
                                    . "by ".$row2['post_creator']." - ".$row2['post_date']."<hr class='forum' />".$row2['post_content']."</div></td><td width='200' valign='top'"
                                    . "align='center'>User Info Here</td></tr><tr><td colspan='2'</td></tr>";
                            }

                            $old_views = $row['topic_views'];
                            $new_views = $old_views + 1;
                            $sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
                            $res3 = mysqli_query($con,$sql3) or die(mysqli_error($con));
                        }
                        echo "</table>";
                    }else {
                        echo "<p>This topic does not exist yet.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
