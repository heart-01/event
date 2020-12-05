@foreach($data as $row)
<tr>
    <td class="text-center">{{ $row->category_id}}</td>
    <td>{{ $row->name}}</td>
    <td class="text-center">
        <button data-category_id="{{ $row->category_id}}" data-name="{{ $row->name}}"
            class="btn btn-warning text-white btn-sm mr-3 showEdit" ><i class="fas fa-pencil-alt"></i> EDIT</button>
        <button data-category_id="{{ $row->category_id}}" data-name="{{ $row->name}}" type="button" class="btn btn-danger btn-sm event_delete" ><i class="fas fa-trash"></i> Delete</button>
    </td>
</tr>
@endforeach

<script src="{{ asset('/js/admin/category/data-row.js') }}" type="text/javascript"></script>