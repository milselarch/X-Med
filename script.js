/*jslint browser: true*/
/*global $, jQuery, QRCode, alert, console*/

/*
to-do
=====================================================================
-   disable add button while waiting for ajax request so that user
    doesn't send too many ajax requests
*/

function addRowToTable(action, name, instructions) {
    'use strict';
    var htmlName, newElement, row;
    htmlName = JSON.stringify("medicine_" + name);
    console.log(name, instructions);
    
    if (action === "insert") {
        $('table tbody').append(
            $("<tr name=" + htmlName + ">").append(
                $('<td/>').text(name),
                $('<td/>').text(instructions)
            )
        );
        console.log("APPENDED");

    } else if (action === "update") {
        row = 'table tbody tr[name=' + htmlName + '] td:nth-child(2)';
        $(row).html(instructions);

    } else if (action === "remove") {
        row = 'table tbody tr[name=' + htmlName + ']';
        console.log(row);
        $(row).remove();
        
    } else {
        console.error(action);
    }
}


function iframeform(url) {
    'use strict';
    
    var object = {};
    object.time = new Date().getTime();
    object.form = $(
        '<form action="' + url + '" target="iframe' + object.time + '" method="post" style="display:none;" id="form' + object.time + '" name="form' + object.time + '"></form>'
    );

    object.addParameter = function (parameter, value) {
        $("<input type='hidden' />")
            .attr("name", parameter)
            .attr("value", value)
            .appendTo(object.form);
    };

    object.send = function () {
        var iframe = $(
            '<iframe data-time="' + object.time + '" style="display:none;" id="iframe'
                + object.time + '"></iframe>'
        );
        
        $("body").append(iframe);
        $("body").append(object.form);
        object.form.submit();
        iframe.load(function () {$('#form' + $(this).data('time')).remove();  $(this).remove(); });
    };
}


$(document).ready(function () {
    'use strict';
    var request, qrcode, width, nameElement, dataElement;
    
    //jQuery('#qrcode').qrcode("this plugin is great");
    //new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");
    width = $('button#add_bttn').width();
    console.log(width);
    
    // turn #qrcode div into QR code
    qrcode = new QRCode("qrcode", {
        text: " ",
        width: 170,
        height: 170,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
    
    nameElement = $("textarea[name='medicineName']");
    dataElement = $("textarea[name='medicineData']");
    nameElement.on('change keydown paste input', function () {
        // whenever name field (nameElement) content changes, set QR code value arccordingly.
        var name = $.trim($(this).val());
        console.log(name);
        qrcode.makeCode(name);
    });
    
    $('div#tableDiv').height($('div#formDiv').height());
    
    //Ajax call to getAll.php to get all medicine entries in database
    request = $.ajax({
        url: 'getAll.php',
        type: 'post',
        success: function (data, textStatus, xhr) {
            var name, instructions, medicines, htmlName, row, k;
            console.log("RAWDATA", data);
            medicines = JSON.parse(data);

            //add medicine names + instructions to table
            for (k = 0; k < medicines.length; k += 1) {
                row = medicines[k];
                console.log(row);
                console.log(row.name, row.instructions);
                addRowToTable('insert', row.name, row.instructions);
            }
            console.log(medicines);
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });
    
    
    $('table#medicineTable').on('click', 'tr', function () {
        if ($(this).hasClass('clicked')) { return; }
        console.log($(this).attr('name'));
        var medicineName, pictureElement;
        
        medicineName = $(this).attr('name');
        medicineName = medicineName.substr(medicineName.indexOf('_') + 1);
        $('table#medicineTable *').removeClass('clicked');
        $('table#medicineTable *').remove('iframe#picture');
        $(this).addClass('clicked');
        
        $("textarea[name='medicineName']").val(medicineName);
                
        pictureElement = $("<iframe id='picture' src='picture.php' scrolling='no'/>", {'class': "images"});
        $(this).children('td').eq(0).append(pictureElement);
        
        pictureElement.on('load', function () {
            console.log("CHEIGHT", pictureElement.contents().height());
            pictureElement.height(pictureElement.contents().height());
        });
    });

    // Bind to the submit event of our form
    console.log("potato", $("p#removeBttn"));
    
    
    $("p#removeBttn").click(function (event) {
        var form, name, instructions, inputs;
        console.log('hiya');
        
        event.preventDefault();
        if (request) {request.abort(); }

        form = $(this);
        inputs = form.find("input, select, button, textarea");
        inputs.prop("disabled", true);
        console.log(inputs);
        
        // Let's select and cache all the fields
        name = $.trim(nameElement.val());
        instructions = $.trim(dataElement.val());
        if (name === '') {
            alert("name is empty!");
            return;
        }

        request = $.ajax({
            url: 'remove.php',
            type: 'post',
            data: {'name': name, 'instructions': instructions},
            success: function (data, textStatus, xhr) {
                var name, instructions, action, result, htmlName, row;
                console.log("RAWDATA", data);
                result = JSON.parse(data);
                
                /*
                result[0] is action, is "update" if php script updated database
                and "insert" if php script inserted new medicine
                */
                action       = result[0];
                name         = result[1];
                instructions = result[2];
                
                console.log(action);

                if (action === 'remove') {
                    //console.log("REMOVING");
                    addRowToTable('remove', name, instructions);
                }
                
                console.log(result);
                inputs.prop("disabled", false);
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
                inputs.prop("disabled", false);
            }
        });
    });
    
    $("form").submit('click', function (event) {
        var form, name, instructions, inputs;
        console.log('hiya');
        
        // Prevent default posting of form - put here to work in case of errors
        event.preventDefault();
        // Abort any pending request
        if (request) {request.abort(); }
        // setup some local variables

        form = $(this);
        //name = $("form textarea[name='medicineName']").val();
        //instructions = $("form textarea[name='medicineName']").val();
        //console.log("NAME", name, instructions);
        
        // Let's select and cache all the fields
        name = $.trim(nameElement.val());
        instructions = $.trim(dataElement.val());
        if (name === '' || instructions === '') {
            alert("name or instructions is empty!");
            return;
        }
        
        inputs = form.find("input, select, button, textarea");
        // Serialize the data in the form
        //serializedData = form.serialize();
        console.log(inputs);

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        inputs.prop("disabled", true);

        // Fire off the request to /form.php
        //console.log("SERIAL", serializedData, inputs);
        
        request = $.ajax({
            url: 'docterEnter.php',
            type: 'post',
            data: {'name': name, 'instructions': instructions},
            success: function (data, textStatus, xhr) {
                var name, instructions, action, result, htmlName, row;
                console.log("RAWDATA", data);
                result = JSON.parse(data);
                
                /*
                result[0] is action, value is "update" if php script updated database
                and "insert" if php script inserted new medicine into database
                */
                action       = result[0];
                name         = result[1];
                instructions = result[2];

                addRowToTable(action, name, instructions);
                
                console.log(result);
                inputs.prop("disabled", false);
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
                inputs.prop("disabled", false);
            }
        });
    });
});