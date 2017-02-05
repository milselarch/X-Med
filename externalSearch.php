<?php
require "session.php"
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
    </head>
    
    <body>
        <div class="centered">
            <?php include_once('nav.php'); ?> 
            
            <div id="test"></div>

            <script>
            console.log('he');
            var myCallback = function() {
              if (document.readyState == 'complete') {
                // Document is ready when CSE element is initialized.
                // Render an element with both search box and search results in div with id 'test'.
                google.search.cse.element.render(
                    {
                      div: "test",
                      tag: 'search'
                     });
              } else {
                // Document is not ready yet, when CSE element is initialized.
                google.setOnLoadCallback(function() {
                   // Render an element with both search box and search results in div with id 'test'.
                    google.search.cse.element.render(
                        {
                          div: "test",
                          tag: 'search'
                        });
                }, true);
              }
            };

            // Insert it before the CSE code snippet so that cse.js can take the script
            // parameters, like parsetags, callbacks.
            window.__gcse = {
              parsetags: 'explicit',
              callback: myCallback
            };

            (function() {
              var cx = '012486766649702085471:ttcuim1egg8'; // Insert your own Custom Search engine ID here
              var gcse = document.createElement('script'); gcse.type = 'text/javascript';
              gcse.async = true;
              gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
            })();
            </script>
        </div>
    </body>
</html>