<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- css files -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/admin/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/admin/css/core.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/admin/css/components.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/admin/css/colors.css')}}" rel="stylesheet" type="text/css">
        <!-- css files -->

        <!-- Core JS files -->
        <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/pace.min.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/blockui.min.js')}}"></script>
        <!-- /core JS files -->

        <!-- validation js files -->
        <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/validation/validate.min.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/validation/additional_methods.min.js')}}"></script>
        <!-- /validation js files -->
        <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>
        <!-- /theme JS files -->

        <script type="text/javascript">
        $.validator.setDefaults({
          ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
                errorClass: 'validation-error-label',
                successClass: 'validation-valid-label',
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },

                // Different components require proper error label placement
                errorPlacement: function(error, element) {

                    // Styled checkboxes, radios, bootstrap switch
                    if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                        if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                            error.appendTo( element.parent().parent().parent().parent() );
                        }
                         else {
                            error.appendTo( element.parent().parent().parent().parent().parent() );
                        }
                    }

                    // Unstyled checkboxes, radios
                    else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                        error.appendTo( element.parent().parent().parent() );
                    }

                    // Input with icons and Select2
                    else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                        error.appendTo( element.parent() );
                    }

                    // Inline checkboxes, radios
                    else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                        error.appendTo( element.parent().parent() );
                    }

                    // Input group, styled file input
                    else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                        error.appendTo( element.parent().parent() );
                    }

                    else {
                        error.insertAfter(element);
                    }
                },
        });
        $(function() {

            // Style checkboxes and radios
            $('.styled').uniform();

        });
        </script>
    </head>
    <body class="login-container">
        <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main content -->
                <div class="content-wrapper">
                    <!-- Content area -->
                    <div class="content">
                        <!-- Simple register form -->
                        <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                            <div class="panel panel-body login-form">
                                <div class="text-center">
                                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i>
                                    </div>
                                    <h5 class="content-group">Register Yourself<small class="display-block">Provide Below Details to Register.</small></h5>
                                </div>

                                @error('approve')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                            {{ $message }}
                                        </div>
                                    </div>
                                </div>
                                @enderror

                                <div class="form-group has-feedback has-feedback-left">
                                    <div class="form-control-feedback"><i class="icon-user text-muted"></i>
                                    </div>
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name">
                                    @error('name')
                                        <label id="name-error" class="validation-error-label capital-txt" for="name">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <div class="form-control-feedback"><i class="icon-envelop text-muted"></i>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">

                                    @error('email')
                                        <label id="email-error" class="validation-error-label capital-txt" for="email">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <div class="form-control-feedback"><i class="icon-envelop text-muted"></i>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <label id="password-error" class="validation-error-label capital-txt" for="password">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <div class="form-control-feedback"><i class="icon-envelop text-muted"></i>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                                </div>

                                <div class="form-group">
                                    <button type="submit"  class="btn bg-blue btn-block">
                                        {{ __('Register') }}
                                        <i class="icon-arrow-right14 position-right"></i>
                                    </button>
                                </div>
                                <div class="text-right">
                                    <a  href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        </form>
                        <!-- /simple register form -->
                        
                        <!-- Footer -->
                        <div class="footer text-muted text-center">
                            &copy;<?php echo date('Y') ?>. Admin Panel by <a target="_blank">Laravel</a>
                        </div>
                        <!-- /footer -->
                    </div>
                    <!-- /content area -->
                </div>
                <!-- /main content -->
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->
    </body>
</html>