<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

    $stmt = $db->prepare("select * from medicine order by name");
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    /*
    the thing with arrays with named entries in php is that
    it creates duplicate numeric and named keys
    
    e.g. array('john' => 14, 'sam' => 17) actually gives:
    array('john' => 14, 'sam' => 17, 0 => 14, 1 => 17) 
    the code below gets rid of 0 => ? and 1 => ? duplicate key-value pairs
    
    appearence of duplicate named/numeric keys doesn't currently affect
    javascript (cos values are retrieved explicitly there), but might be 
    cause for behavior issues in future
    
    foreach ($result as $index => $row) {
        error_log(count($row));
        unset($result[$index][0]);
        unset($result[$index][1]);
    }
    */
    
    //$result = array_intersect_key($result, $filter);
    echo json_encode($result);
    
} catch (PDOException $e) {
    error_log('LINENO: ' . $e->getLine());
    echo $e->getMessage();
}
