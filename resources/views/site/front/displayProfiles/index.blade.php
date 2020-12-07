@extends('layouts.front')

@section('sidebar')
    <hr>
@stop

@section('content')

{{-- Change Profile --}}
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3">
                    <i class="fas fa-user-edit"></i>
                    Profile : 
                </div>
   
                <div class="card-body">  
                        @if($errors->get('current_password') || $errors->get('new_password') || $errors->get('new_confirm_password') ) 
                        @else 
                            @foreach ($errors->all() as $message)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error!</strong> {{ $message }}
                            </div> 
                            @endforeach 
                        @endif
                        <?= Form::open(array('route' => 'myprofile.profile','id' => 'frmEditProfile')) ?>
                            <div class="form-group">
                                <?= Form::label('stuId', 'ID Student'); ?>
                                <?= Form::text('stuId', isset($data->student_id) ? $data->student_id : null, ['class' => 'form-control form-control-custom', 'placeholder' => 'ID Student', 'autocomplete'=> 'off','required']); ?>
                            </div>
                            <div class="form-group">
                                <?= Form::label('fname', 'First name'); ?>
                                <?= Form::text('fname', isset($data->fname) ? $data->fname : null, ['class' => 'form-control form-control-custom', 'placeholder' => 'First name', 'autocomplete'=> 'off','required']); ?>
                            </div>
                            <div class="form-group">
                                <?= Form::label('lname', 'Last name'); ?>
                                <?= Form::text('lname', isset($data->lname) ? $data->lname : null, ['class' => 'form-control form-control-custom', 'placeholder' => 'Last name', 'autocomplete'=> 'off','required']); ?>
                            </div>
                            <div class="form-group">
                                <?= Form::label('school', 'School'); ?>
                                <?= Form::select('school', [ 'SET'=>'SET', 'SERD'=>'SERD', 'SOM'=>'SOM' ], isset($data->school) ? $data->school : null, ['class' => 'form-control mb-3 form-control-custom', 'placeholder' => 'Select School' , 'required']); ?>
                            </div>
                            <div class="form-group">
                                <?= Form::label('fos', 'FOS'); ?>
                                <?= Form::text('fos', isset($data->FOS) ? $data->FOS : null, ['class' => 'form-control form-control-custom', 'placeholder' => 'FOS', 'autocomplete'=> 'off','required']); ?>
                            </div>
                            <div class="form-group">
                                <?= Form::label('tel', 'TEL'); ?>
                                <?= Form::text('tel', isset($data->tel) ? $data->tel : null, ['class' => 'form-control form-control-custom', 'placeholder' => 'xxx-xxxxxxx', 'autocomplete'=> 'off','required']); ?>
                            </div>
                            <div class="form-group">
                                <?= Form::label('line_id', 'LINE ID'); ?>
                                <?= Form::text('line_id', isset($data->line_id) ? $data->line_id : null, ['class' => 'form-control form-control-custom', 'placeholder' => 'LINE ID', 'autocomplete'=> 'off']); ?>
                            </div>
                            <div class="form-group">
                                <?= Form::label('facebook_name', 'Facebook'); ?>
                                <?= Form::text('facebook_name', isset($data->facebook_name) ? $data->facebook_name : null, ['class' => 'form-control form-control-custom','placeholder' => 'Facebook Name', 'autocomplete'=> 'off']); ?>
                            </div>
                            <div class="form-group">
                                <?= Form::label('email', 'Email'); ?>
                                <?= Form::text('email', isset($data->email) ? $data->email : null, ['class' => 'form-control form-control-custom','placeholder' => 'name@domain.com', 'autocomplete'=> 'off','required']); ?>
                            </div>
                            
                            <div class="form-group text-center">
                                <?= Form::submit('Confirm', ['class' => 'btn btn-success']); ?>
                            </div>
                        <?= Form::close() ?>                            
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Change Password --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3">
                    <i class="fas fa-unlock-alt"></i>
                    Change Password : 
                </div>
   
                <div class="card-body">
                    <form method="POST" action="{{ route('myprofile.password') }}">
                        @csrf 

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password Old : </label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-control-custom" name="current_password" autocomplete="current-password">
                                @foreach ($errors->get('current_password') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach 
                            </div>
                        </div>                        
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password : </label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control form-control-custom" name="new_password" autocomplete="current-password">
                                
                                @foreach ($errors->get('new_password') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach 
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password : </label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control form-control-custom" name="new_confirm_password" autocomplete="current-password">
                                @foreach ($errors->get('new_confirm_password') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach 
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check-circle"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

@endsection