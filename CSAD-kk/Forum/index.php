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
        <title>Untitled Document</title>
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
            $sql = "SELECT * FROM categories ORDER BY category_title ASC";
            $res = mysqli_query($con,$sql) or die(mysqli_error());
            $categories="";
            if (mysqli_num_rows($res) > 0){
                while ($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['category_title'];
                    $description = $row["category_description"];
                    $categories .= "<a href='view_category.php?cid=".$id."' class='cat_links'>".$title." - <font size='-1'>".$description."</font></a>";
                }
                echo $categories;
            }else{
                echo "<P>There are no categories availiable yet.</P>";
            }
            ?>
            
        </div>
        </div>       
    </body>
</html>
