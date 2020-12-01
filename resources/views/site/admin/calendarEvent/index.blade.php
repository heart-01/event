@extends('layouts.dashboard')

@section('content')
<div class="kanin row">
    <div class="text-left col-9">
        <h5>All Events ({{$count}} Events)</h5>
    </div>
    <div class="text-right col-3">
        <button class="btn btn-block" data-toggle="modal" data-target="#showAdd" style="background-color: #260176;color:white">
            Create Event
        </button>
    </div>
</div>

<div class="card kanin mt-3">
    <!-- card-body -->
    <div class="card-body">
        <div class="dataTables_wrapper dt-bootstrap4">
            @include('site/admin/calendarEvent/pagination')
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="event_id" />
            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
        </div>
    </div>
</div>

@include('site/admin/calendarEvent/modal')

<script>
    var config = {
        routes: {
            index: "{{ route('calendarEvent') }}",
            fetch_data: "{{ route('calendarEvent.fetch_data') }}",
            pagination_link: "{{ route('calendarEvent.pagination_link') }}",
            update: "{{ route('calendarEvent.update') }}",
            del: "{{ route('calendarEvent.calendarEvent_del') }}",
        },
        asset: {
            def: "{{ asset('images') }}",
            img_edit: "{{ asset('images/front/resize/banner') }}",
            link_img_edit: "{{ asset('images/front/img_event') }}",
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

<script src="{{ asset('/js/admin/calendarEvent/index.js') }}" type="text/javascript"></script>

@endsection