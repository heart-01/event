@extends('layouts.front')

@section('content')

<div class="mb-1" style="font-size: 25px;font-weight: 600">
   Upcoming Events
</div>

<div class="row">
    @include('site/front/data-row')      
</div><!-- row -->

@if (Session::get('status')=='4')
    <script>
        Swal.fire("<span class='kanin'>Cannot access, please contact the system administrator.</span>", "", "warning")
        .then(() => {
            $('.logout').trigger('click');
        });
    </script>
@endif

<script src="{{ asset('js/front/main/main.js') }}"></script>

@endsection