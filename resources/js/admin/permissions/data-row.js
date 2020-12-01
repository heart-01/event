$(".status_user").change(function(){
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');
    var status_user = $(this).val();

    Swal.fire({
        title: "<span class='kanin'>Confirm the status change <span style='color:#8000ff'>\n\""+name+"\"</span> \nYes or No ??</span>",
        text: "", 
        icon: "warning",
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
                    url: config.routes.chg_stu,
                    type: 'POST',
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id, status_user: status_user },
                    success:function(data){
                        result = data;
                    }
                })
            ).then(function() {
                if(result=="change"){
                    Swal.fire({
                        title: "<span class='kanin'> Status changed.. </span>",
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

});