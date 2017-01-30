<?php
session_start(); // Starting Session

if (isset($_POST['submit'])) {
    if (!isset($_POST['username'])) {
        header("location: index.php");
        
    } else {
        // Define $username and $password
        $username = $_POST['username'];
        
        $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

        /* these three lines get number of medicine entries with name $name */
        $stmt = $db->prepare("select count(*) from users where username = ?");
        $stmt->execute(array($username));
        $rows = (int) $stmt->fetchColumn();

        if ($rows == 1) {
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: medicine.php"); // Redirecting To Other Page
        } else {
            header("location: index.php");
        }
    }
}
?>