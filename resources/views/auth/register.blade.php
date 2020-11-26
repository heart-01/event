@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: #e2ab05;"><i class="fas fa-user-plus"></i> {{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="stuId" class="col-md-4 col-form-label text-md-right">{{ __('* Student ID') }}</label>

                            <div class="col-md-6">
                                <input id="stuId" type="text" class="form-control form-control-custom @error('stuId') is-invalid @enderror" name="stuId" value="{{ old('stuId') }}" required autocomplete="stuId" placeholder="Student ID.." autofocus>

                                @error('stuId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('* First Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control form-control-custom @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" placeholder="First Name.." autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('* Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control form-control-custom @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" placeholder="Last Name" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="school" class="col-md-4 col-form-label text-md-right">{{ __('* School') }}</label>

                            <div class="col-md-6" required placeholder="school">
                                <select class="custom-select form-control-custom" name="school" id="school">
                                    <option value="" disabled selected>Select school...</option>
                                    <option value="SET">SET</option>
                                    <option value="SERD">SERD</option>
                                    <option value="SOM">SOM</option>
                                  </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fos" class="col-md-4 col-form-label text-md-right">{{ __('* FOS') }}</label>

                            <div class="col-md-6">
                                <input id="fos" type="text" class="form-control form-control-custom @error('fos') is-invalid @enderror" name="fos" value="{{ old('fos') }}" required autocomplete="fos" placeholder="FOS.." autofocus>

                                @error('fos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('* TEL') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control form-control-custom @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" placeholder="TEL.." autofocus>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lineId" class="col-md-4 col-form-label text-md-right">{{ __('* Line ID') }}</label>

                            <div class="col-md-6">
                                <input id="lineId" type="text" class="form-control form-control-custom @error('lineId') is-invalid @enderror" name="lineId" value="{{ old('lineId') }}" required autocomplete="lineId" placeholder="Line ID.." autofocus>

                                @error('lineId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="facebookName" class="col-md-4 col-form-label text-md-right">{{ __('* Facebook Name') }}</label>

                            <div class="col-md-6">
                                <input id="facebookName" type="text" class="form-control form-control-custom @error('facebookName') is-invalid @enderror" name="facebookName" value="{{ old('facebookName') }}" required autocomplete="facebookName" placeholder="Facebook Name.." autofocus>

                                @error('facebookName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('* E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control-custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address.." >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('* Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-control-custom @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password..">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('* Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control form-control-custom" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password..">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color: #260176;color:white">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection