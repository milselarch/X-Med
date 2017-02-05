$(document).ready(function () {
    var nameElement = $("textarea[name='username']");
    console.log(nameElement);
    
    nameElement.on('change keydown paste input', function () {
        // whenever name field (nameElement) content changes, set QR code value arccordingly.
        var name = $.trim($(this).val());
        //console.log(name);
        
        $('table#userTable tbody').find('tr').each(function () {
            var rowName = $(this).attr('name');
            //console.log(this, rowName);
            
            if (rowName.indexOf(name) !== -1) {
                console.log(this, rowName);
                $(this).css('display', 'table-row');
            } else {
                $(this).css('display', 'none');
            }
        });
    });
})