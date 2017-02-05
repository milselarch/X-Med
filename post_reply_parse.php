<?php
require 'session.php';

if (isset($_POST['reply_submit'])) {
    include_once('connect.php');
    $creator = $_SESSION['login_user'];
    $cid = $_POST['cid'];
    $tid = $_POST['tid'];
    $reply_content = $_POST['reply_content'];
    
    error_log($db);
    $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
    
    $stmt = $db->prepare("
        INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES
        (:cid, :tid, :creator, :reply_content, now());
        ");
    $res = $stmt->execute(array(
        ":cid" => $cid, ":tid" => $tid, ":creator" => $creator,
        ":reply_content" => $reply_content
    ));
    
    $sql2 = $db->prepare("
        UPDATE categories SET last_post_date = now(), last_user_posted = :creator
        where id = :cid LIMIT 1;
        ");
    $res2 = $sql2->execute(array(":cid" => $cid, ":creator" => $creator));
    
    $sql3 = $db->prepare("
        UPDATE topics SET topic_reply_date = now(), topic_last_user = :creator
        where id = :tid LIMIT 1;
        ");
    $res3 = $sql3->execute(array(":tid" => $tid, ":creator" => $creator));

    //Email Sending
    if (($res) && ($res2) && ($res3)) {
        header("location: view_topic.php?cid=" . $cid . "&tid=" . $tid);
    } else {
        $_SESSION["MSSG"] = "<p>There was a problem posting your reply. Try again later";
        header('location: post_reply.php');
    }

} else {
    exit();
}
