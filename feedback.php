<?php
require "session.php";

$username = $_SESSION['login_user'];
$db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

$stars = 0;
if (isset($_POST['star'])) {
    $stars = $_POST['star'];
    
    $stmt = $db->prepare("
        INSERT INTO ratings (rating, Username) VALUES (:stars, :username)
        ON DUPLICATE KEY UPDATE rating = :stars
        ");
    $stmt->execute(array(":stars" => $stars, ":username" => $username));
    
} else {
    /* these three lines get number of medicine entries with name $name */
    $stmt = $db->prepare("select rating from ratings where Username = ?");
    $stmt->execute(array($username));

    if ($stmt->rowCount() == 0) {
        $stars = 0;
    } else {
        $stars = (int) $stmt->fetchColumn();
    } 
}
?>

<html>
	<head>
	    <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="QR%20code/qrcode.min.js"></script>
        <script src="script.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="feedback.css"/>
        
	</head>
    
	<body>
		<div class="centered">
            <?php include_once('nav.php'); ?>
            <!-- 
            $('#star-5').is(":checked")
            -->
            
            <form id="feedback" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                <p>Rate our service:</p>

                <div class="stars">
                    <input class="star star-5" id="star-5" type="radio" name="star" value='5'/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star" value='4'/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star" value='3'/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star" value='2'/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star" value='1'/>
                    <label class="star star-1" for="star-1"></label>
                </div>
                
                <script>
                    $('div.stars').ready(function () {
                        console.log("STARS", <?php echo $stars ?>);
                        $('#star-' + String(<?php echo $stars ?>)).click();
                    })
                    
                    //console.log("STARS1", <?php echo $stars ?>);
                </script>
                
                <?php
                    $stmt = $db->prepare("SELECT AVG(rating) FROM ratings");
                    $stmt->execute(array($username));
                    $stars = $stmt->fetchColumn();
                    echo "<br/><br/><br/><p> average rating: $stars stars</p>"; 
                ?>
                
                <input type="submit" name="submit"/>
            </form>
        </div>
		
		<!--
		<script src='https://cdn.html5maker.com/embed.js?id=8a4dccd6ef65710963bc3bfd97ea497f569eeefc5052&responsive=1&width=160&height=600&h5mTag=html5maker'></script>
		-->
	</body>
</html>