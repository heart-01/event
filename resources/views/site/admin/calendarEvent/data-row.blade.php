@foreach($data as $row)
<tr>
    <td class="text-center">{{ $row->event_id}}</td>
    <td>
        <div class="text-center">                            
            <?php $folder = explode(".", $row->banner); ?>
            <a href="{{ ($row->banner!='nopic.jpg') ? url('images/front/img_event').'/'.$folder[0].'/'.$row->banner : url('images').'/'.$row->banner }}" data-lity>
                <img src="{{ ($row->banner!='nopic.jpg') ? url('images/front/resize/banner').'/'.$row->banner : url('images').'/'.$row->banner }}" style="width:100px">
            </a>
        </div>
    </td>
    <td>{{ $row->name}}</td>
    <td>{{ $row->description}}</td>
    <td>{{ $row->organizer}}</td>
    <td>{{ date('d/m/Y', strtotime($row->eventDateForm))}} <br> {{' To '}} <br> {{ date('d/m/Y', strtotime($row->eventDateTo)) }}</td>
    <td>{{ date('d/m/Y', strtotime($row->registerStartDate))}} <br> {{' To '}} <br> {{ date('d/m/Y', strtotime($row->registerEndDate)) }}</td>
    <td class="text-center">
        <button data-event_id="{{ $row->event_id}}" data-name="{{ $row->name}}" data-description="{{ $row->description}}" data-banner="{{ $row->banner}}"
            data-category_id="{{ $row->category_id}}" data-eventDateFormTo="{{ date('d-m-Y', strtotime($row->eventDateForm)).' - '.date('d-m-Y', strtotime($row->eventDateTo)) }}" 
            data-data_registerStartEndDate="{{ date('d-m-Y', strtotime($row->registerStartDate)).' - '.date('d-m-Y', strtotime($row->registerEndDate)) }}"
            data-surveyRequired="{{ $row->surveyRequired}}" data-certificateAvailable="{{ $row->certificateAvailable}}" data-organizer="{{ $row->organizer}}"
            class="btn btn-warning text-white btn-sm mr-3 showEdit" ><i class="fas fa-pencil-alt"></i> EDIT</button>
        <button data-event_id="{{ $row->event_id}}" data-name="{{ $row->name}}" type="button" class="btn btn-danger btn-sm event_delete" ><i class="fas fa-trash"></i> Delete</button>
    </td>
</tr>
@endforeach

<script src="{{ asset('/js/admin/calendarEvent/data-row.js') }}" type="text/javascript"></script>