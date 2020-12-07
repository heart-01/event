@extends('layouts.front')

@section('sidebar')
    <hr>
@stop

@section('content')
<div class="text-center">
    <h1 style="font-weight: bold;">My Events</h1>
</div>

<div class="text-left">
    <h5>All Events ({{$count}} Events)</h5>
</div>

<div class="text-center mt-5 w-100" style="margin-bottom: 100px;">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Registered Date</th>
                <th scope="col">Certificate</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $row)
            <tr>
                <th>{{ $key+1 }}</th>
                <td>{{ $row->name }}</td>
                <td>{{ date('d/m/Y', strtotime($row->registered_date)) }}</td>
                <td>
                    @if($row->certificate_code != null)
                    <button class="btn btn-success text-white"> Certificate <i class="fas fa-download"></i></button>
                    @else
                    -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection