//showEdit
$(".showEdit").click(function(){
    var event_id = $(this).attr('data-event_id');
    var name = $(this).attr('data-name');
    var img = $(this).attr('data-banner');
    var link_img = img.split('.');
    var description =  $(this).attr('data-description');
    var category_id =  $(this).attr('data-category_id');
    var eventDateFormTo =  $(this).attr('data-eventDateFormTo');
    var data_registerStartEndDate =  $(this).attr('data-data_registerStartEndDate');
    var surveyRequired =  $(this).attr('data-surveyRequired');
    var certificateAvailable =  $(this).attr('data-certificateAvailable');
    var place =  $(this).attr('data-place');
    var organizer =  $(this).attr('data-organizer');

    $('#showEdit').modal('show'); 
    $("#event_id-edit").val(event_id);
    $("#name-edit").val(name);
    if(img == "nopic.jpg"){
        $("#img-edit").attr("src", config.asset.def + "/" + img);
        $("#link-img-edit").attr("href", config.asset.def + "/" + img);
    }else{
        $("#img-edit").attr("src", config.asset.img_edit + "/" + img);
        $("#link-img-edit").attr("href", config.asset.link_img_edit + "/" + link_img[0] + "/" + img);
    }
    $("#description-edit").val(description);
    $('#category-edit').selectpicker('val', category_id);
    $("#eventDateFormTo-edit").val(eventDateFormTo);
    $("#registerStartEndDate-edit").val(data_registerStartEndDate);
    (surveyRequired == '1') ? $("#SurveyRequired1-edit").attr('checked', 'checked') : $("#SurveyRequired2-edit").attr('checked', 'checked');
    (certificateAvailable == '1') ?  $("#certificateAvailable1-edit").attr('checked', 'checked') : $("#certificateAvailable2-edit").attr('checked', 'checked');
    $("#place-edit").val(place);  
    $("#organizer-edit").val(organizer);    

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