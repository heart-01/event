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
    <td>{{ date('d/m/Y', strtotime($row->eventDateForm)) }} <br> {{' To '}} <br> {{ date('d/m/Y', strtotime($row->eventDateTo)) }}</td>
    <td>{{ date('d/m/Y', strtotime($row->registerStartDate)) }} <br> {{' To '}} <br> {{ date('d/m/Y', strtotime($row->registerEndDate)) }}</td>
    <td class="text-center">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog"></i>
            </button>
            <div class="dropdown-menu text-center">
                <?= Form::open(array('route' => array('report.registered'),'target' => '_blank')) ?>
                    <?= Form::hidden('event_id', $row->event_id) ?>
                    <?= Form::hidden('Ename', $row->name) ?>
                    <?= Form::hidden('event_Date', date('d/m/Y', strtotime($row->registerStartDate))) ?>
                    <button type="submit" class="dropdown-item" ><i class="fas fa-user-check"></i> User Registered </button>
                <?= Form::close() ?>

                <div class="dropdown-divider"></div>

                <button data-event_id="{{ $row->event_id}}" data-name="{{ $row->name}}" data-description="{{ $row->description}}" data-banner="{{ $row->banner}}"
                    data-category_id="{{ $row->category_id}}" data-eventDateFormTo="{{ date('d-m-Y', strtotime($row->eventDateForm)).' - '.date('d-m-Y', strtotime($row->eventDateTo)) }}" 
                    data-data_registerStartEndDate="{{ date('d-m-Y', strtotime($row->registerStartDate)).' - '.date('d-m-Y', strtotime($row->registerEndDate)) }}"
                    data-surveyRequired="{{ $row->surveyRequired}}" data-certificateAvailable="{{ $row->certificateAvailable}}" data-place="{{ $row->place}}" data-organizer="{{ $row->organizer}}"
                    class="dropdown-item showEdit" style="background-color: #ffc107;color: white;" ><i class="fas fa-pencil-alt"></i> EDIT</button>
                
                <div class="dropdown-divider"></div>

                <button data-event_id="{{ $row->event_id}}" data-name="{{ $row->name}}" class="text-white bg-danger event_delete dropdown-item" ><i class="fas fa-trash"></i> Delete </button>
            </div>
        </div>

        
    </td>
</tr>
@endforeach

<script src="{{ asset('/js/admin/calendarEvent/data-row.js') }}" type="text/javascript"></script>