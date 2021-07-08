@extends('admin.layouts.welcome')
@section('title',"Login")

@push('css-plugins')
@endpush
@push('css-styles')
<link href="{{asset('/assets/app/custom/login/login-v6.default.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
            <div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside">
                <div class="kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__body">
                            <div class="kt-login__logo">
                                <img src="{{asset('assets/media/logos/logo-2-sm.png')}}">
                            </div>
                            <div class="kt-login__signin">
                                <div class="kt-login__head">
                                    <h3 class="kt-login__title">Admin Panel</h3>
                                </div>
                                <div class="kt-login__form">
                                    <form method="POST" class="kt-form" action="{{ route('admin.login.post') }}" id="login">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    
                                        <div class="kt-login__actions">
                                            <button  class="btn btn-brand btn-pill btn-elevate redbtn" type="submit">SIGN IN</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        <!--begin::Modal-->
                        <div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Forgotten Password ?</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <form> -->
                                            <div class="form-group">
                                                <label for="forget-email" class="form-control-label">Email<span style="color:#f00;">*</span></label>
                                                <input type="email" name="forget_email" class="form-control" id="forget_email" placeholder="Enter your registered email" autofocus="on" name="forget-email">
                                                <div class="invalid-feedback" id="forget_email_error"></div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary redbtn" id="forget-request" name="forget-request">Request</button>

                                        </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url({{asset('assets/media//bg/bg-4.jpg')}});">
                        <div class="kt-login__section">
                            <div class="kt-login__block">
                                <h3 class="kt-login__title">Best Admin Panel</h3>
                                <div class="kt-login__desc">
                                Lorem ipsum, or lipsum as it is sometimes known, is dummy text  <br>used in laying out print, graphic or web designs.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @push('script-plugins')
        @endpush

        @push('scripts')
        <!-- <script src="{{asset('/assets/app/custom/login/login-general.js')}}" type="text/javascript"></script> -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <script type="text/javascript">
            $('#kt_login_forgot').click(function(){
                $('#kt_modal_5').modal('show');
            });

            jQuery(document).ready(function() {
                @if(session()->has('password'))
                swal("Success",  "{!!Session::get('password')!!}", "success");
                @endif
                @if(session()->has('mail_error'))
                swal("Error",  "{!!Session::get('mail_error')!!}", "error");
                @endif
            });
        </script>

        @endpush