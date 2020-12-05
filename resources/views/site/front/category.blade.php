@extends('layouts.front')

@section('content')

<div class="mb-5" style="font-size: 25px;font-weight: 600">
   Upcoming Events
</div>

<div class="row">
    @foreach($data as $row)        
        <div class="col-6 col-sm-3 col-md-3">
            <a href="{{ url('/Event/'.$row->event) }}" class="nav-link">
                <img src="{{ ($row->banner!='nopic.jpg') ? url('images/front/resize/banner').'/'.$row->banner : url('images').'/'.$row->banner }}" style="max-width: 70%;">
                <div class="event-info">
                    <div class="event-date text-danger mt-2 mb-1">
                        <?php echo App\Event::DateToText( date('d-m-Y', strtotime($row->eventDateForm)).' - '.date('d-m-Y', strtotime($row->eventDateTo)) ); ?>
                    </div>
                    <div class="event-title mb-1">
                        {{ $row->event }}
                    </div>
                    <div class="short-location text-muted d-flex align-items-baseline">
                        <i class="fas fa-map-marker-alt mr-3"></i>
                        {{ $row->organizer }}
                    </div>
                </div>
            </a>
        </div>        
    @endforeach
</div>

@endsection