//modal Add
var name = document.getElementById('name');
name.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Event name. Thai or English or Number only !');
}
name.oninput = function(event) {
    event.target.setCustomValidity('');
}

var description = document.getElementById('description');
description.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Description. Thai or English or Number only !');
}
description.oninput = function(event) {
    event.target.setCustomValidity('');
}

var eventDateFormTo = document.getElementById('eventDateFormTo');
eventDateFormTo.oninvalid = function(event) {
    event.target.setCustomValidity('Please select format Event DateForm - DateTo !');
}
eventDateFormTo.oninput = function(event) {
    event.target.setCustomValidity('');
}

var registerStartEndDate = document.getElementById('registerStartEndDate');
registerStartEndDate.oninvalid = function(event) {
    event.target.setCustomValidity('Please select format Register Event DateForm - DateTo !');
}
registerStartEndDate.oninput = function(event) {
    event.target.setCustomValidity('');
}

$('#poster').change( function(e) {
    var files = this.files[0];
    var n = files.name,
        s = files.size,
        t = files.type.split('/')[0];
    if (t!="image") {
        Swal.fire("<span class='kanin'>Please select image file type.</span>", "", "warning");
        $('#btnfrmAdd').prop('disabled', true);
        $(this).css("border", "#FF0000 solid 2px");     
        return false;  
    }else if (s > 1048576) { //1MB
        Swal.fire("<span class='kanin'>Please deselect this \nfile: "+n+" it\'s larger than the maximum filesize allowed. Sorry!</span>", "", "warning");
        $('#btnfrmAdd').prop('disabled', true);
        $(this).css("border", "#FF0000 solid 2px");     
        return false;       
    }
    $('#btnfrmAdd').prop('disabled', false);
});

var place = document.getElementById('place');
place.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Name Place. Thai or English or Number only !');
}
place.oninput = function(event) {
    event.target.setCustomValidity('');
}

var organizer = document.getElementById('organizer');
organizer.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Name organizer. Thai or English or Number only !');
}
organizer.oninput = function(event) {
    event.target.setCustomValidity('');
}

$("#frmAdd").on("submit", function() {
    var eventDateFormTo = $('#eventDateFormTo').val();
    var registerStartEndDate = $('#registerStartEndDate').val();
    if (eventDateFormTo  === '') {
        Swal.fire("<span class='kanin'>Please select Event Date !</span>", "", "warning").then(() => { $('#eventDateFormTo').focus(); });
        return false;
    }else if(registerStartEndDate  === ''){
        Swal.fire("<span class='kanin'>Please select Register Event Date !</span>", "", "warning").then(() => { $('#registerStartEndDate').focus(); });
        return false;
    }

    var $SurveyRequired = $('input:radio[name="SurveyRequired"]');
    $SurveyRequired.addClass("validate[required]");

    var $certificateAvailable = $('input:radio[name="certificateAvailable"]');
    $certificateAvailable.addClass("validate[required]");

    return true;
});

//modal Edit
var name_edit = document.getElementById('name-edit');
name_edit.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Event name. Thai or English only !');
}
name_edit.oninput = function(event) {
    event.target.setCustomValidity('');
}

var description_edit = document.getElementById('description-edit');
description_edit.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Description. Thai or English or Number only !');
}
description_edit.oninput = function(event) {
    event.target.setCustomValidity('');
}

var eventDateFormTo_edit = document.getElementById('eventDateFormTo-edit');
eventDateFormTo_edit.oninvalid = function(event) {
    event.target.setCustomValidity('Please select format Event DateForm - DateTo !');
}
eventDateFormTo_edit.oninput = function(event) {
    event.target.setCustomValidity('');
}

var registerStartEndDate_edit = document.getElementById('registerStartEndDate-edit');
registerStartEndDate_edit.oninvalid = function(event) {
    event.target.setCustomValidity('Please select format Register Event DateForm - DateTo !');
}
registerStartEndDate_edit.oninput = function(event) {
    event.target.setCustomValidity('');
}

$('#poster-edit').change( function(e) {
    var files = this.files[0];
    var n = files.name,
        s = files.size,
        t = files.type.split('/')[0];
    if (t!="image") {
        Swal.fire("<span class='kanin'>Please select image file type.</span>", "", "warning");
        $('#btnfrmEdit').prop('disabled', true);
        $(this).css("border", "#FF0000 solid 2px");     
        return false;  
    }else if (s > 1048576) { //1MB
        Swal.fire("<span class='kanin'>Please deselect this \nfile: "+n+" it\'s larger than the maximum filesize allowed. Sorry!</span>", "", "warning");
        $('#btnfrmEdit').prop('disabled', true);
        $(this).css("border", "#FF0000 solid 2px");     
        return false;       
    }
    $('#btnfrmEdit').prop('disabled', false);
});

var place_edit = document.getElementById('place-edit');
place_edit.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Name Place. Thai or English or Number only !');
}
place_edit.oninput = function(event) {
    event.target.setCustomValidity('');
}

var organizer_edit = document.getElementById('organizer-edit');
organizer_edit.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Name organizer. Thai or English or Number only !');
}
organizer_edit.oninput = function(event) {
    event.target.setCustomValidity('');
}

$("#frmEdit").on("submit", function() {
    var eventDateFormTo_edit = $('#eventDateFormTo-edit').val();
    var registerStartEndDate_edit = $('#registerStartEndDate-edit').val();
    if (eventDateFormTo_edit  === '') {
        Swal.fire("<span class='kanin'>Please select Event Date !</span>", "", "warning").then(() => { $('#eventDateFormTo-edit').focus(); });
        return false;
    }else if(registerStartEndDate_edit  === ''){
        Swal.fire("<span class='kanin'>Please select Register Event Date !</span>", "", "warning").then(() => { $('#registerStartEndDate-edit').focus(); });
        return false;
    }

    var $SurveyRequired = $('input:radio[name="SurveyRequired-edit"]');
    $SurveyRequired.addClass("validate[required]");

    var $certificateAvailable = $('input:radio[name="certificateAvailable-edit"]');
    $certificateAvailable.addClass("validate[required]");

    return true;
});