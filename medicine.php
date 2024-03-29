<?php 
require 'session.php';
    
$userType = $_SESSION["user_type"];
if ($userType == 'user') {
    header("location: medicine_user.php");
}

?>

<html>
	<head>
	    <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="QR%20code/qrcode.min.js"></script>
        <script src="validate.js"></script>
        <script src="script.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        
	</head>
    
	<body>
		<div class="centered">
            <?php include_once('nav.php'); ?>
            <!-- 
            centers all the inside content, purely aesthetic
            -->
             
            <div id='titleDiv'>
                <!-- <h1 id="Name"> X-Med </h1>
                <!-- <div class="slider"> --> 
			</div>
           
            <br/>
            
            <div id='fieldData'>
                <!-- 
                everything on the left side is in formDiv 
                everything on the right side is in tableDiv 
                -->
                <div id="formDiv">                    
                    <form id="editForm">
                        <p>Name:</p>
                        <textarea 
                            class="form" name="medicineName" 
                            cols="40" rows="1" maxlength="32"
                        ><?= $_POST["medicineName"] ?></textarea>

                        <br/><br/>
                        <p>Instructions:</p>
                        <textarea class="form" name="medicineData" cols="40" rows="5"></textarea>
                        <br/>

                        <div>
                            <div id="buttonDiv">
                                <button type="submit" id='add_bttn'>
                                <b>+</b> Medicine 
                                </button> <br/>
                                <p id="removeBttn">remove</p>
                            </div>

                            <!-- this div will be transformed into a QR code 
                            by the QR code libary -->
                            <div id="qrcode"></div>

                        </div>
                    </form>
                </div>
                
                <div id="searchTable">
                    <div id="tableDiv">                    
                        <table class="table" id="medicineTable">
                            <tbody>
                                <tr style='display:none' id="google_search_tr" name="google"><td><img src="google.png" style='width: 100%;' alt=""></td><td id="google_search_td"></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
		</div>
		
	</body>
</html>