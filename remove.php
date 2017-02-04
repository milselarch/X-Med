<?php
// assert that medicineName and medicineData are set
assert(isset($_POST["name"]) and isset($_POST["instructions"]));

$name = htmlspecialchars($_POST["name"], ENT_QUOTES).trim();
$instructions = htmlspecialchars($_POST["instructions"], ENT_QUOTES);
$action = "none";

try {
    $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

    /* these three lines get number of medicine entries with name $name */
    $stmt = $db->prepare("select count(*) from medicine where name = ?");
    $stmt->execute(array($name));
    $rows = (int) $stmt->fetchColumn();
    //error_log("ROWS" . $rows);

    // delete medicine record if it exists
    if ($rows > 0) {
        $sql = "delete from imagePaths where name = ?;";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($name));
        
        $sql = "delete from medicine where name = ?;";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($name));
        $action = "remove";
    }

    echo json_encode([$action, $name, $instructions]);
    
} catch (PDOException $e) {
    error_log('LINENO: ' . $e->getLine());
    echo $e->getMessage();
}
