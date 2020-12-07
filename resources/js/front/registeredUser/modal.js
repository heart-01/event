$("#frmRegistered").on("submit", function() {    
    var data = $(this).serialize();
    var event_id = $("#event_id").val();
    var name = $("#name").val();

    if (grecaptcha.getResponse()!="") {
        $.ajax({
            url: config.routes.registered,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { event_id: event_id },
            success:function(result){
                if(result == "success"){
                    Swal.fire({
                        title: "<span class='kanin'> Finished.. </span>",
                        text: "",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(()=> {
                        window.location.href = config.routes.index +'/'+ name;
                    });  
                }
            }
        });
    }else{
        Swal.fire("Please complete the recaptcha to submit the form.", "", "warning");
    }

    return false;
});