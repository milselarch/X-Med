<?php
require 'session.php';

$userType = $_SESSION["user_type"];
if ($userType == 'user') {
    header("location: medicine_user.php");
}

$db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'admin') { $newType = 'admin'; }
    else if ($_POST['submit'] == 'user') { $newType = 'staff'; }
    else if ($_POST['submit'] == 'staff') { $newType = 'user'; }
    else { die(); }
    
    $user = $_POST["username"];
    $stmt = $db->prepare("update users set userType = :userType where Username = :username");
    $stmt->execute(array(":userType" => $newType, ":username" => $user));
}

?>

<html>
	<head>
	    <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="users.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        
        <style>
            div #tableDiv {
                overflow-y: auto;
                height: 100%;
            }
            
            div #searchTable {
                width: 100%;
                margin-top: 0.8rem;
            }
            
            table.table tbody tr td {
                word-wrap: break-word;
                border-bottom: 1px solid #eee;
                border-top: none;
            } table.table thead tr {
                border-bottom: 2px solid #eee;
            } table.table thead tr td {
                margin-top: 0.5rem;
                font-weight: 800;
            }
            
            textarea[name='medicineName'] {
                width: 100%;
            }
            
            input[type='submit'] {
                margin: 0px;
                font-size: 1.8rem;
            } input[name='username'] {
                display: none;
            }
            
        </style>
        
	</head>
    
	<body>
		<div class="centered">
            <?php include_once('nav.php'); ?>
            <!-- 
            centers all the inside content, purely aesthetic
            -->
           
            <br/>
            
            <div id='fieldData'>
                <!-- 
                everything on the left side is in formDiv 
                everything on the right side is in tableDiv 
                -->
                
                <textarea 
                    class="form" name="username" 
                    cols="40" rows="1" maxlength="32"
                    placeholder="Search username..."
                ></textarea>
                
                <div id="searchTable">
                    <div id="tableDiv">                    
                        <table class="table" id="userTable">
                            <thead>
                                <tr>
                                    <td>type</td>
                                    <td>name</td>
                                    <td>username</td>
                                    <!-- <td>ID</td> -->
                                    <td>email</td>
                                </tr>    
                            </thead>
                            
                            
                            <tbody>
                                <?php 
                                    $stmt = $db->prepare("select * from users order by Username");
                                    $stmt->execute();
                                    
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $username = $row["Username"];
                                        $type = $row["userType"];
                                        
                                        echo "<tr name='$username'>";
                                        echo ("<td><form action='' method=POST>"
                                            . "<input type='submit' name='submit' value='$type'/>"
                                            . "<input type='text' name='username' value='$username'/>"
                                            . "</form></td>"
                                            );
                                        
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $username . "</td>";
                                        //echo "<td>" . $row["ID"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
		</div>
		
	</body>
</html>