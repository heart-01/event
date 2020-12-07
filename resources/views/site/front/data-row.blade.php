@for ($i = 0; $i < $c_category; $i++)   

    <div class="mt-5 mb-4 row col-12 col-sm-12 col-md-12">
        <div class="text-left col-6 col-sm-6 col-md-6" style="font-size: 25px;font-weight: 600" >
            {{ $category[$i] }}
        </div>
        <div class="text-right col-6 col-sm-6 col-md-6" style="font-size: 20;">
            <a href="{{ url('/category/'.$category[$i]) }}" class="nav-link active-menu">
                View All
            </a>
        </div>
    </div>

    <div class="row col-12 col-sm-12 col-md-12">
        @foreach($data[$i] as $row)        
            <div class="col-6 col-sm-3 col-md-3">
                <a href="{{ url('/Event/'.$row->event) }}" class="nav-link">
                    <img src="{{ ($row->banner!='nopic.jpg') ? url('images/front/resize/banner').'/'.$row->banner : url('images').'/'.$row->banner }}" style="max-width: 70%;">
                    <div class="event-info">
                        <div class="event-date text-danger mt-2 mb-1">
                            <?php echo date('d M Y', strtotime($row->eventDateForm)).' - '.date('d M Y', strtotime($row->eventDateTo)); ?>
                        </div>
                        <div class="event-title mb-1">
                            {{ $row->event }}
                        </div>
                        <div class="short-location text-muted d-flex align-items-baseline">
                            <i class="fas fa-map-marker-alt mr-3"></i>
                            {{ $row->place }}
                        </div>
                    </div>
                </a>
            </div>        
        @endforeach
    </div>

@endfor