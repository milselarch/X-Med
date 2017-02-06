/*jslint browser: true*/

/*

$(document).ready( function() {
    var errorMessage = "Please match the requested format.";
    $( this ).find( "textarea" ).on( "input change propertychange", function() {
        console.log("HI GI");
        
        var pattern = $( this ).attr( "pattern" );

        if (typeof pattern !== typeof undefined && pattern !== false) {
            var patternRegex = new RegExp( "^" + pattern.replace(/^\^|\$$/g, '') + "$", "g");
            console.log(patternRegex, $(this).val());
            
            hasError = !$(this).val().match(patternRegex);

            if (typeof this.setCustomValidity === "function") {
                console.log("CUSTOM");
                this.setCustomValidity( hasError ? errorMessage : "" );
            }
            
            else {
                $(this).toggleClass( "error", !!hasError );
                $(this).toggleClass( "ok", !hasError );

                if (hasError) {
                    $( this ).attr( "title", errorMessage );
                } else {
                    $( this ).removeAttr( "title" );
                }
            }
        }
        
        if (hasError) {
            console.log("REWRITIN");
            var value = $(this).val()
            var newValue = "";
            
            for (var i = 0; i < value.length; i++) {
                if (value[i].match(patternRegex)) {
                    newValue += value[i];
                }
            }
            
            $(this).val(newValue);
        }

    });
});

*/