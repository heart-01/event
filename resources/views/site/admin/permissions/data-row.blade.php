@foreach($data as $row)
<tr>
    <td class="text-center">{{ $row->id}}</td>
    <td>{{ $row->fname}} {{ $row->lname}}</td>
    <td>{{ $row->school}}</td>
    <td>{{ $row->FOS}}</td>
    <td>{{ $row->tel}}</td>
    <td>
        <?= Form::select('status_user', ['4'=>'Block', '1'=>'Admin', '2'=>'SU', '3'=>'User', ], $row->status_user, ['class' => 'form-control selectpicker status_user', 'dropupAuto' =>'false', 'data-size' =>'5', 'placeholder' => 'Select Status Users', 'data-id'=> $row->id, 'data-name'=> $row->fname . $row->lname]); ?>
    </td>
</tr>
@endforeach

<script src="{{ asset('/js/admin/permissions/data-row.js') }}" type="text/javascript"></script>