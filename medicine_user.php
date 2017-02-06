<?php
require 'session.php';
?>

<html>
	<head>
	    <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="validate.js"></script>
        <script src="script_user.js"></script>

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
            }
            
            table.table tbody tr td {
                word-wrap: break-word;
                border-bottom: none;
                border-top: none;
            }
            
            textarea[name='medicineName'] {
                width: 100%;
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
                    class="form" name="medicineName" 
                    cols="40" rows="1" maxlength="32"
                    placeholder="search..."
                ></textarea>
                
                <div id="searchTable">
                    <div id="tableDiv">                    
                        <table class="table" id="medicineTable">
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                
            </div>
		</div>
		
	</body>
</html>