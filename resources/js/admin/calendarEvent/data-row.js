//showEdit
$(".showEdit").click(function(){
    var event_id = $(this).attr('data-event_id');
    var name = $(this).attr('data-name');

    $('#showEdit').modal('show'); 
    $("#event_id-edit").val(event_id);
    $("#name-edit").val(name);

    return false;
});

//event_delete
$(".event_delete").click(function(){
    var event_id = $(this).attr('data-event_id');
    var name = $(this).attr('data-name');
    
    Swal.fire({
        title: "<span class='kanin'>Delete <span style='color:#d33'>\n\""+name+"\"</span> \nYes or No ??</span>",
        text: "", 
        icon: "warning",
        iconColor: '#d33',
        width: 700,
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        confirmButtonText: 'Yes',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No'
    })
    .then((result) => {
        if (result.isConfirmed) {
            $.when(
                $.ajax({
                    url: config.routes.del,
                    type: 'POST',
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { event_id : event_id },
                    success:function(data){
                        result = data;
                    }
                })
            ).then(function() {
                if(result=="del"){
                    Swal.fire({
                        title: "<span class='kanin'>Delete \""+name+"\" </span>",
                        text: "",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(()=> {
                        window.location.href = config.routes.index;
                    });                    
                }
            });
        }
    });

    return false;
});