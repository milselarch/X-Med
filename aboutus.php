<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--
Sticky footer example by Mr. M. - Confederation College - IMD Program 

Based on tutorial from: http://www.coders-guide.com/watch.php?v=53
-->
<head>
    <link rel="icon" href="favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="stylesheet.css">
    <link href="jumbotron.css" rel="stylesheet">
</head>

<body>
    <div class='centered'>
        <?php 
            require 'nav.php';
        ?>
        
        <div class="container">  
            <h2>ABOUT US</h2>


            <div class="row marketing">
                <div class="col-lg-6">
                    <p>
                       <img src="http://www.cdn.sciencebuddies.org/Files/7234/6/medicines-and-syringe.jpg" alt="sticky bun flickr.com" class="img-responsive img-rounded center-block">
                    </p>
                </div>

                <div class="col-lg-6">
                    <?php
                        $db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

                        $stmt = $db->prepare("select info from buisness_info where type='what' limit 1");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $about = $row["info"];

                        $stmt = $db->prepare("select info from buisness_info where type='who' limit 1");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $creator = $row["info"];
                    ?>
                
                    <h2>What is X-Med?</h2>
                    
                    <p>
                    <?= $about ?>
                    </p>
                    
                    <h3>
                    Who created X-MED?
                    </h3>
                    
                    <p>
                    <?= $creator ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <p class="navbar-text pull-left">© Site build by Charles, Charlotte And KK.</p>
        </div>
    </div>

</body>