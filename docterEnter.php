<?php
// assert that medicineName and medicineData are set
assert(isset($_POST["name"]) and isset($_POST["instructions"]));

$name = htmlspecialchars($_POST["name"], ENT_QUOTES).trim();
$instructions = htmlspecialchars($_POST["instructions"], ENT_QUOTES);

try {
    $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

    /* these three lines get number of medicine entries with name $name */
    $stmt = $db->prepare("select count(*) from medicine where name = ?");
    $stmt->execute(array($name));
    $rows = (int) $stmt->fetchColumn();
    error_log("ROWS" . $rows);

    if ($rows > 0) {
        // update database with new medicine info if it already exists
        $sql = "UPDATE medicine SET instructions = ? where name = ?;";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($instructions, $name));
        $action = "update";
    } else {
        // create new medicine with info in database
        $sql = "INSERT INTO medicine VALUES(?, ?);";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($name, $instructions));
        $action = "insert";
    }

    // $action is echoed back to let the client side know if the medicine
    // info was updated or created.
    echo json_encode([$action, $name, $instructions]);
    
} catch (PDOException $e) {
    error_log('LINENO: ' . $e->getLine());
    echo($e->getMessage());
}
