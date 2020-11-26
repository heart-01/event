//modal Add
var name = document.getElementById('name');
name.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Event name. Thai or English only !');
}
name.oninput = function(event) {
    event.target.setCustomValidity('');
}
$('#banner').change( function(e) {
    var files = e.originalEvent.target.files;
    for (var i=0, len=files.length; i<len; i++){
        var n = files[i].name,
            s = files[i].size,
            t = files[i].type.split('/')[0];
        
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
    }
    $('#btnfrmAdd').prop('disabled', false);
});

//modal Edit
var name_edit = document.getElementById('name-edit');
name_edit.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Event name. Thai or English only !');
}
name_edit.oninput = function(event) {
    event.target.setCustomValidity('');
}