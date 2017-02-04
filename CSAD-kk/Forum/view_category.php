<?php session_start();?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            $cid = $_GET['cid'];
            $topics = ""; 
            if(isset($_SESSION['uid'])){
                $logged = " | <a href='create_topic.php?cid=".$cid."'>Click Here To Create A Topic</a>";
            }else{
                $logged = " | Plaese log in to create topics in this form.";
            }
            $sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
            $res = mysqli_query($con,$sql) or die(mysqli_error());
            if(mysqli_num_rows($res) == 1){
                $sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
                $res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
                
                if(mysqli_num_rows($res2) > 0){
                    $topics .= "<table width='100%' style='border-collapse: collapse;'>";
                    $topics .= "<tr><td= colspan='3'><a href='index.php'>Return to Forum Index</a>".$logged."<hr /></td></tr>";
                    $topics .= "<tr style= 'background-color: #dddddd;'><td>Topic Title</td><td width='65' align='center'>Replies</td><td width='65'"
                            . "align='ceter'>Views</td></tr>";
                    $topics .= "<tr><td colspan='3'><hr /></td></tr>";
                    while ($row = mysqli_fetch_assoc($res2)){
                        $tid = $row['id'];
                        $title = $row['topic_title'];
                        $views = $row['topic_views'];
                        $date = $row['topic_date'];
                        $creator = $row['topic_creator'];
                        $topics .= "<tr><td><a href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br />
                            <spam class='post_info'>Posted by: ".$creator." on ".$date."</span><td/>"
                                . "<td align='center'>0</td><td align='center'>".$views."</td></tr>";
                        $topics .= "<tr><td colspan'3'><hr /></td></tr>";
                        
                    }
                    $topics .= "</table>";
                    echo $topics;
                }else{
                    echo "<a href='index.php'>Return to Forum Index</a><hr />";
                    echo "<p>There are no topics in this category yet.".$logged."</P>";
                }
            }else{
                echo "<a href='index.php'>Return to Forum Index</a><hr />";
                echo "<p>You are trying to view a category that does not exist yet.";
            }
            ?>
        </div>
        </div>
       
    </body>
</html>