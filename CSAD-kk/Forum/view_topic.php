<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Category</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <div id='wrapper'>
            <h2>Log in to Forum</h2>
            <p>Creating login functionality</P>
            <?php
            
            if(!isset($_SESSION['uid'])){
                echo "<form action='login_parse.php' method='post'>
                    Username: <input type='text' name='username'/>&nbsp;
                    Password: <input type='password' name ='password' />&nbsp;
                    <input type='submit' name='submit' value='Log in' /> ";
            }else{
                echo "<p>You are logged in as ".$_SESSION['username']."&bull; <a href='logout_parse.php'>Logout</a>";
            }
            ?>
        <hr/>
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
                if($_SESSION['uid']){
                    echo "<tr><td colspan='2'><input type='submit' value='Add Reply' onClick=\"window.location = 
                    'post_reply.php?cid=".$cid."&tid=".$tid."'\" /><hr />"; 
                } else{
                    echo "<tr><td colspan='2'><p>Please log in to add your response.</p><hr /f></td></tr>";   
                }
                while($row = mysqli_fetch_assoc($res)){
                    $sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
                    $res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
                    while ($row2 = mysqli_fetch_assoc($res2)){
                        echo "<tr><td valign ='top' style='border: 1px solid #000000;'><div style='min-height: 125px;'>".$row['topic_title']."<br/ >"
                                . "by".$row2['post_creator']." - ".$row2['post_date']."<hr />".$row2['post_content']."</div></td><td width='200' valign='top'"
                                . "align='center' style='border: 1px solid #000000;'>User Info Here</td></tr><tr><td colspan='2'><hr /></td></tr>";
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
       
    </body>
</html>
