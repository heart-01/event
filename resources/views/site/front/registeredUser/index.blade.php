@extends('layouts.front')

@section('sidebar')
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <?= Form::hidden('event_id', $data->event_id, ['id' => 'event_id'],); ?> 
          <?= Form::hidden('name', $data->name, ['id' => 'name'],); ?> 
          <?php $folder = explode(".", $data->banner); ?>
          <img src="{{ ($data->banner!='nopic.jpg') ? url('images/front/img_event').'/'.$folder[0].'/'.$data->banner : url('images').'/'.$data->banner }}" class="d-block w-100" height="650" alt="pichead"
          style="-webkit-filter: blur(10px);filter: blur(10px);">

          {{-- Desktop --}}
          <div class="carousel-caption d-none d-md-block" style="top: 0%;transform: translateY(1%);">
            <div class="card-group w-100">
                <div class="card" style="max-width: 40%;">
                  <div class="card-body text-center">
                    <img src="{{ ($data->banner!='nopic.jpg') ? url('images/front/img_event').'/'.$folder[0].'/'.$data->banner : url('images').'/'.$data->banner }}" style="width:100%">
                  </div>
                </div>
                <div class="card" style="border: none;">
                  <div class="card-body data align-items-center text-dark">
                    <div class="col-12">
                        <p class="card-text mb-5">
                            <div class="text-left" style="font-size: 40px;font-weight: 600">
                                {{ $data->name }}
                            </div>
                        </p>
                        <p class="card-text">
                          <div class="text-left">
                              {{ $data->description }}
                          </div>
                        </p>
                        <p class="card-text">
                            <div class="text-left">
                                <i class="far fa-calendar-alt mr-3"></i> 
                                <?php echo date('d M Y', strtotime($data->eventDateForm)).' - '.date('d M Y', strtotime($data->eventDateTo)); ?>
                            </div>
                        </p>
                        <p class="card-text">
                          <div class="text-left">
                              Organizer : 
                              {{ $data->organizer }}
                          </div>
                        </p>
                        <p class="card-text">
                          <div class="text-left">
                              <i class="fas fa-map-marker-alt mr-3"></i>
                              {{ $data->place }}
                          </div>
                        </p>
                        <p class="card-text">
                            <div class="text-left">
                                <i class="fas fa-users mr-2"></i>
                                <span class="following-count-text">{{ $no_of_registration }} followers</span>
                            </div>
                        </p>

                        @if(App\RegisteredUser::CheckRegister(Auth::user()->id,$data->event_id)->count()=='1')
                        <p class="card-text">
                          <div class="text-left">
                            <button type="button" class="btn btn-success rounded-pill" disabled>
                                <i class="far fa-registered mr-1"></i> Registered
                            </button>
                          </div>
                        </p>
                        @else
                        <p class="card-text">
                          <div class="text-left">
                            <button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#showRegisterEvent">
                                <i class="far fa-registered mr-1"></i> Register
                            </button>
                          </div>                          
                        </p>
                        @endif
                        
                    </div>
                  </div>
                </div>
                <div class="card" style="max-width: 10%;">
                  <div class="card-body"></div>
                </div>
            </div>            
          </div>

          {{-- Mobile --}}
          <div class="carousel-caption d-block d-sm-block d-md-block d-lg-none" style="top: 0%;transform: translateY(1%);">
            <img src="{{ ($data->banner!='nopic.jpg') ? url('images/front/img_event').'/'.$folder[0].'/'.$data->banner : url('images').'/'.$data->banner }}" style="width:100%">
          </div>

        </div>
      </div>
    </div>
@stop

@section('content')
    @include('site/front/registeredUser/modal')

    {{-- <div class="text-left mb-4" style="font-size: 40px;font-weight: 600">
        Detail
    </div>
    <div class="text-left" style="font-size: 25px;">
        {{ $data->description }}
    </div>     --}}

    <script>
      var config = {
          routes: {
            index: "{{ url('/Event/') }}",
            registered: "{{ route('registered.registered') }}",
            ruleCaptcha: "{{ route('registered.ruleCaptcha') }}",
          }
      };
    </script>

@endsection