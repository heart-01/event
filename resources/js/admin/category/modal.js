//modal Add
var name = document.getElementById('name');
name.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Category name. Thai or English or Number only !');
}
name.oninput = function(event) {
    event.target.setCustomValidity('');
}

//modal Edit
var name_edit = document.getElementById('name-edit');
name_edit.oninvalid = function(event) {
    event.target.setCustomValidity('Please enter a Category name. Thai or English or Number only !');
}
name_edit.oninput = function(event) {
    event.target.setCustomValidity('');
}