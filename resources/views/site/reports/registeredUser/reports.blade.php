@extends('layouts.dashboard')

@section('content')

<div class="text-right">
    <?= Form::open(array('route' => array('report.registered.pdf'),'target' => '_blank')) ?>
        <?= Form::hidden('event_id', $event_id) ?>
        <?= Form::hidden('name', $name) ?>
        <?= Form::hidden('organizer', $organizer) ?>
        <?= Form::hidden('event_date', $event_date) ?>
        <button type="submit" class="btn btn-success text-white"> PDF <i class="fas fa-download"></i></button>
    <?= Form::close() ?>
</div>

<div class="text-left">
    <h5 style="font-weight: bold;">Events : {{$name}}</h5>
    <h5 style="font-weight: bold;">Date : {{$event_date}}</h5>
</div>

<div class="text-center mt-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Registered Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $row)
            <tr>
                <th>{{ $key+1 }}</th>
                <td>{{ $row->student_id }}</td>
                <td>{{ $row->fname . " " . $row->lname }}</td>
                <td>{{ date('d M Y', strtotime($row->registered_date)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection