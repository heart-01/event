@extends('layouts.dashboard')

@section('content')
<div class="kanin row">
    <div class="text-left col-9">
        <h5>All Users ({{$count}} Account)</h5>
    </div>
</div>

<div class="card kanin mt-3">
    <!-- card-body -->
    <div class="card-body">
        <div class="dataTables_wrapper dt-bootstrap4">
            @include('site/admin/permissions/pagination')
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
        </div>
    </div>
</div>

<script>
    var config = {
        routes: {
            index: "{{ route('permissions') }}",
            fetch_data: "{{ route('permissions.fetch_data') }}",
            pagination_link: "{{ route('permissions.pagination_link') }}",
            chg_stu: "{{ route('permissions.change_status') }}",
        },
    };
</script>

@if (session()->has('Success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "<span class='kanin'><?php echo session()->get('Success'); ?></span>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@elseif (session()->has('Warning'))
    <script>
        Swal.fire("<span class='kanin'><?php echo session()->get('Warning'); ?></span>", "", "warning");
    </script>
@endif

<script src="{{ asset('/js/admin/permissions/index.js') }}" type="text/javascript"></script>

@endsection