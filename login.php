<?php
session_start(); // Starting Session

if (isset($_POST['submit'])) {
    if (!isset($_POST['username'])) {
        error_log("NO USERNAME");
        header("location: index.php");
        
    } else {
        // Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

        /* these three lines get number of medicine entries with name $name */
        $stmt = $db->prepare("select count(*) from users where Username = ? and Password = ?");
        $stmt->execute(array($username, $password));
        $rows = (int) $stmt->fetchColumn();

        if ($rows == 1) {
            $stmt = $db->prepare(
                "select ID, userType from users where Username = ? and Password = ? limit 1"
            );
            $stmt->execute(array($username, $password));
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $userType = $result["userType"];
            $ID = (int) $result["ID"];
            
            $_SESSION['user_type'] = $userType;
            $_SESSION['login_user'] = $username; // Initializing Session
            //$_SESSION['user_type'] = $ID;
            
            error_log("VALID");
            header("location: medicine.php"); // Redirecting To Other Page
        } else {
            error_log("NO MATCH");
            header("location: index.php");
        }
    }
}
