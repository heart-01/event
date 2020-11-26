@foreach($data as $row)
<tr>
    <td class="text-center">{{ $row->event_id}}</td>
    <td>{{ $row->name}}</td>
    <td class="text-center">
        <button data-event_id="{{ $row->event_id}}" data-name="{{ $row->name}}" class="btn btn-warning text-white btn-sm mr-3 showEdit" ><i class="fas fa-pencil-alt"></i> EDIT</button>
        <button data-event_id="{{ $row->event_id}}" data-name="{{ $row->name}}" type="button" class="btn btn-danger btn-sm event_delete" ><i class="fas fa-trash"></i> Delete</button>
    </td>
</tr>
@endforeach

<script src="{{ asset('/js/admin/calendarEvent/data-row.js') }}" type="text/javascript"></script>