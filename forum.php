<?php
require "session.php";
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
        <title>Untitled Document</title>
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" type="text/css" href="forum.css"/>
    </head>
    
    <body>
        <div class="centered">
            <?php require 'nav.php'; ?>
           
            <div id='wrapper'>
                <h2 class='forum'>X-Med Forums</h2>

                <hr/>
                <div id="content">
                    <?php
                    include_once("connect.php");

                    $sql = "SELECT * FROM categories ORDER BY category_title ASC";
                    $res = mysqli_query($con, $sql) or die(mysqli_error());

                    $categories = "";
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['category_title'];
                            $description = $row["category_description"];
                            $categories .= "<a href='view_category.php?cid=".$id."' class='cat_links forum'>".$title." - <font size='-1'>".$description."</font></a>";
                        }
                        echo $categories;
                    }else{
                        echo "<P>There are no categories availiable yet.</P>";
                    }
                    ?>

                </div>
            </div>
        </div>       
    </body>
</html>
