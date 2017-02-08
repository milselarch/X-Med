<?php
    require 'session.php';
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
        <title>View Category</title>
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
                <h2 class='forum'>X-Med Forums</h2>
                
                <hr class='forum'/>
                
                <div id="content">
                    <?php
                    include_once("connect.php");
                    
                    $cid = $_GET['cid'];
                    $topics = "";
                
                    $logged = " | <a href='create_topic.php?cid=" . $cid . "'>Click Here To Create A Topic</a>";

                    $sql = "SELECT id FROM categories WHERE id='" . $cid . "' LIMIT 1";
                    $res = mysqli_query($con,$sql) or die(mysqli_error());

                

                    if (mysqli_num_rows($res) == 1) {
                        $sql2 = "SELECT * FROM topics WHERE category_id='" . $cid . "' ORDER BY topic_reply_date DESC";
                        $res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));

                        if(mysqli_num_rows($res2) > 0){
                            $topics .= "<table width='100%' style='border-collapse: collapse;'>";
                            $topics .= "<tr><td= colspan='3'><a href='forum.php'>Return to Forum Index</a>" . $logged . "<hr class='forum'/></td></tr>";
                            $topics .= "<tr style= 'background-color: #dddddd;'><td>Topic Title</td><td width='65' align='center'>Replies</td><td width='65'"
                                    . "align='ceter'>Views</td></tr>";
                            $topics .= "<tr><td colspan='3'></td>";
                            $topics .= "</tr>";

                            while ($row = mysqli_fetch_assoc($res2)){
                                $tid = $row['id'];
                                $title = $row['topic_title'];
                                $views = $row['topic_views'];
                                $date = $row['topic_date'];
                                $creator = $row['topic_creator'];
                                
                                $rsql = "SELECT count(*) as c FROM posts WHERE topic_id='" . $tid . "' LIMIT 1";
                                $posts = mysqli_query($con, $rsql);
                                $posts = mysqli_fetch_assoc($posts)["c"];

                                $topics .= "<tr>";
                                $topics .= "<td><a href='view_topic.php?cid=" . $cid . "&tid=" . $tid . "'>" . $title . "</a><br/> <span class='post_info'> Posted by: " . $creator . " on " . $date . "</span>";
                                $topics .= "<td align='center'>" . $posts . "</td><td align='center'>".$views."</td>";
                                $topics .= "</tr>";

                            }

                            $topics .= "</table>";
                            echo $topics;
                        } else {
                            echo "<a href='index.php'>Return to Forum Index</a><hr />";
                            echo "<p>There are no topics in this category yet.".$logged."</P>";
                        }

                    } else {
                        echo "<a href='index.php'>Return to Forum Index</a><hr />";
                        echo "<p>You are trying to view a category that does not exist yet.";
                    }
                    ?>
                </div>
            </div> 
        </div>
       
    </body>
</html>