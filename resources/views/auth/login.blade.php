@php
$settings = \App\Models\Setting::query()->first();
@endphp
<!DOCTYPE html>
<html lang="{{app()->getlocale()}}" dir="{{direction()}}">
<!--begin::Head-->
<head>
<base href="../../../../">
<meta charset="utf-8"/>
<title>{{web('login')}}</title>
<meta name="description" content="Login page"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<meta name="csrf-token" content="{{csrf_token()}}">
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
<!--end::Fonts-->
<!--begin::Page Custom Styles(used by this page)-->
<link href="{{ asset('/assets/css/pages/login/classic/login-1.'.direction('.').'css') }}" rel="stylesheet" type="text/css"/>
<!--end::Page Custom Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{ asset('/assets/plugins/global/plugins.bundle.'.direction('.').'css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/plugins/custom/prismjs/prismjs.bundle.'.direction('.').'css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/css/style.bundle.'.direction('.').'css') }}" rel="stylesheet" type="text/css"/>
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<link href="{{ asset('/assets/css/themes/layout/header/base/light.'.direction('.').'css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/css/themes/layout/header/menu/light.'.direction('.').'css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/css/themes/layout/brand/dark.'.direction('.').'css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/css/themes/layout/aside/dark.'.direction('.').'css') }}" rel="stylesheet" type="text/css"/>
<!--end::Layout Themes-->
<link rel="shortcut icon"  href="{{ asset('/assets/media/logos/logo_s.png') }}"/>
   <style>
       .btn.btn-primary {
           color: #FFFFFF;
           background-color: #de5c26;
           border-color: #de5c26;
       }
   </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body  oncontextmenu="return false" id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
<!--begin::Login-->
<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10"
         style="background-color: #de5c26;">
        <!--begin: Aside Container-->
        <div class="d-flex flex-row-fluid flex-column justify-content-between" align="center">
            <!--begin: Aside header-->
        {{--                <a href="#" class="flex-column-auto mt-5">--}}
        {{--                    <img src="{{ asset('/adminAssets/media/logos/logo-white.png') }}" class="max-h-70px" alt=""/>--}}
        {{--                </a>--}}
        <!--end: Aside header-->
            <!--begin: Aside content-->
            <div class="flex-column-fluid d-flex flex-column justify-content-center">
                <h3 class="font-size-h1 mb-5 text-white">{{web('Control panel for application management')}}</h3>
                <h5 class="font-size-h5 mb-5 text-white">{{web('Welcome to ')}} {{ optional($settings)->name }}</h5>
            </div>
            <!--end: Aside content-->
            <!--begin: Aside footer for desktop-->
            <div class="justify-content-between mt-10" >
                <div class="opacity-70 font-weight-bold text-white">{{\Carbon\Carbon::now()->year}}&nbsp;&copy;&nbsp;<a href="https://www.photonslab.com/" target="_blank"  style="color: white;">Photons Lab</a></div>
            </div>
            <!--end: Aside footer for desktop-->
        </div>
        <!--end: Aside Container-->
    </div>
    <!--begin::Aside-->
    <!--begin::Content-->
    <div class="flex-row-fluid d-flex flex-column position-relative p-7 overflow-hidden">
        <!--begin::Content header-->
        <div
            class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
            {{-- <a href="{{ url('locale/ar') }}">
                        <span class="navi-link-rounded-lg"><img class="rounded-circle" title="{{web('Arabic')}}"
                                                                src="{{asset('/assets/media/flags/133-saudi-arabia.svg')}}"  width="25" alt=""/></span>
            </a>
            <a href="{{ url('locale/en') }}">
                        <span class="navi-link-rounded-lg"><img class="rounded-circle" title="{{web('English')}}"
                                                                src="{{asset('/assets/media/flags/226-united-states.svg')}}"  width="25" alt=""/></span>
            </a> --}}
        </div>
        <!--end::Content header-->
        <!--begin::Content body-->
        <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
            <!--begin::Signin-->

            <div class="login-form login-signin">
                <div class="text-center mb-10 mb-lg-20">
                    <a href="#" class="flex-column-auto mt-5">
                        <img src="{{ asset('/assets/media/logos/logo_s.png') }}" style="margin-bottom: 35px;" width="120" alt=""/>
                    </a>
                    <h3 class="font-size-h1">{{web('login')}}</h3>
                    <p class="text-muted font-weight-bold">{{web('Enter your email and password')}}</p>
                </div>
                <!--begin::Form-->
                <form class="form" id="kt_login_signin_form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="text"
                               placeholder="{{web('email')}}" name="email" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                               placeholder="{{web('password')}}" name="password" autocomplete="off"/>
                    </div>
                    <!--begin::Action-->
                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                        {{-- <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2"
                           id="kt_login_forgot">{{web('Forgot Password ?')}}</a> --}}
                        <button type="button" id="kt_login_signin_submit"
                                class="btn btn-primary font-weight-bold px-9 py-4 my-3" style=""> {{web('login')}}
                        </button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Signin-->
            <!--begin::Forgot-->
            <div class="login-form login-forgot">
                <div class="text-center mb-10 mb-lg-20">
                    <h3 class="font-size-h1">{{web('Forgotten Password ?')}}</h3>
                    <p class="text-muted font-weight-bold">{{web('Enter your email to reset your password')}}</p>
                </div>
                <!--begin::Form-->
                <form class="form"  id="kt_login_forgot_form">
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="email"
                               placeholder="{{web('Email')}}" name="email" autocomplete="off"/>
                    </div>
                    <div class="form-group d-flex flex-wrap flex-center">
                        <button type="button" id="kt_login_forgot_submit"
                                class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">{{web('Send')}}
                        </button>
                        <button type="button" id="kt_login_forgot_cancel"
                                class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">{{web('Cancel')}}
                        </button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Forgot-->
        </div>
        <!--end::Content body-->
        <!--begin::Content footer for mobile-->
        <div
            class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
            {{-- <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">{{\Carbon\Carbon::now()->year}}&nbsp;&copy;&nbsp;{{$settings->name}}</div> --}}
            <div class="d-flex order-1 order-sm-2 my-2">

            </div>
        </div>
        <!--end::Content footer for mobile-->
    </div>
    <!--end::Content-->
</div>
<!--end::Login-->
</div>
<!--end::Main-->
<!--begin::Global Config(global config for global JS scripts)-->
<script>
var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1200
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#F3F6F9",
                "dark": "#212121"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#ECF0F3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#212121",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#ECF0F3",
            "gray-300": "#E5EAEE",
            "gray-400": "#D6D6E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#80808F",
            "gray-700": "#464E5F",
            "gray-800": "#1B283F",
            "gray-900": "#212121"
        }
    },
    "font-family": "Poppins"
};</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('/assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/custom/prismjs/prismjs.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/scripts.bundle.js') }}" type="text/javascript"></script>

<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script type="text/javascript">
var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            KTUtil.getById('kt_login_signin_form'),
            {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "{{web('Email is required')}}"
                            }, emailAddress: {
                                message: "{{web('Email is not correct')}}"
                            },
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "{{web('Password is required')}}"
                            },
                            stringLength: {
                                min:6,
                                message: '{{web('Password at least must be 6 digits')}}'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );

        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                $("#kt_login_signin_submit").click(function(){
                    $("#kt_login_signin_submit").addClass("spinner  spinner-right spinner-sm spinner-ligh");
                    document.getElementById("kt_login_signin_submit").disabled = true;
                });
                if (status == 'Valid') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('login') }}",
                        data: new FormData($("#kt_login_signin_form")[0]),
                        dataType: 'json',
                        async: false,
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        success: function (e) {
                            if (e['result'] == 'ok') {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };
                                toastr.success(e['message']);
                                setTimeout(function () {
                                    $(location).attr('href', e['url']);
                                }, 1500);

                            }
                            else {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };
                                toastr.error(e['message']);
                                $("#kt_login_signin_submit").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                                document.getElementById("kt_login_signin_submit").disabled = false;
                            }


                        },
                        error: function (e) {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": true,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };
                            var error = e.responseJSON['errors'];
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    toastr.error(member[i]);
                                }
                            });

                            $("#kt_login_signin_submit").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                            document.getElementById("kt_login_signin_submit").disabled = false;


                        }
                    });
                }
                else {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    toastr.error('{{web('Please, Insert All Required Items Correctly')}}');
                    $("#kt_login_signin_submit").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                    document.getElementById("kt_login_signin_submit").disabled = false;
                }
            });
        });

        // Handle forgot button
        $('#kt_login_forgot').on('click', function (e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function (e) {
            e.preventDefault();
            _showForm('signup');
        });
    }

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    fullname: {
                        validators: {
                            notEmpty: {
                                message: 'Username is required'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            },
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            }
                        }
                    },
                    cpassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'You must accept the terms and conditions'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );

        $('#kt_login_signup_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "All is cool! Now you submit this form",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    var _handleForgotForm = function(e) {
        var validation;
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            KTUtil.getById('kt_login_forgot_form'),
            {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "{{web('Email address is required')}}"
                            },
                            emailAddress: {
                                message: "{{web('The value is not a valid email address')}}"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );
        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function (e) {
            e.preventDefault();
            _showForm('signin');
        });
        // Handle submit button
        $('#kt_login_forgot_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    // Submit form
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "",
                        data: new FormData($("#kt_login_forgot_form")[0]),
                        dataType: 'json',
                        async: false,
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        success: function (e) {
                            if (e['result'] == 'ok') {
                                _showForm('signin');
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };
                                toastr.success(e['message']);
                                setTimeout(function () {
                                    $(location).attr('href', e['url']);
                                }, 1500);

                            }
                            else {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };
                                toastr.error(e['message']);
                                $("#kt_login_signin_submit").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                                document.getElementById("kt_login_signin_submit").disabled = false;
                            }


                        },
                        error: function (e) {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": true,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };
                            var error = e.responseJSON['errors'];
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    toastr.error(member[i]);
                                }
                            });

                            $("#kt_login_signin_submit").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                            document.getElementById("kt_login_signin_submit").disabled = false;


                        }
                    });
                    KTUtil.scrollTop();
                }
            });
        });


    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            // _handleSignUpForm();
            _handleForgotForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});

</script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>

