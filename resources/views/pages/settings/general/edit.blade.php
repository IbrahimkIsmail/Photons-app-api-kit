@extends('admin.layouts.master')
@section('pageTitle')
    {{admin('Edit Settings')}}
@endsection
@section('styles')

@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        <a class="text-dark" href="{{route('admin.home')}}">{{admin('Home')}}</a>
                    </h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark" href="">{{admin('General Settings')}}</a>
                        </span>
                    </div>
                    <!--end::Search Form-->
                </div>
                <!--end::Details-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title"> {{admin('General Settings')}}</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" id="edit_form">
                                <div class="card-body">
                                    <!--begin: Code-->
                                    <input type="hidden" name="id"
                                           value="{{$data->id}}">

                                    <ul class="nav nav-pills" id="myTab1" role="tablist" style="margin-bottom: 25px;">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="general-tab-1" data-toggle="tab" href="#general">
																	<span class="nav-icon">
																		<i class="flaticon-home"></i>
																	</span>
                                                <span class="nav-text">{{admin('General')}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#contact-1" aria-controls="contact">
																	<span class="nav-icon">
																		<i class="flaticon2-rocket"></i>
																	</span>
                                                <span class="nav-text">{{admin('Contact')}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="social-tab-1" data-toggle="tab" href="#social-1" aria-controls="social">
																	<span class="nav-icon">
																		<i class="flaticon-twitter-logo la la-facebook-messenger"></i>
																	</span>
                                                <span class="nav-text">{{admin('Social')}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="others-tab-1" data-toggle="tab" href="#others-1" aria-controls="others">
																	<span class="nav-icon">
																		<i class="flaticon2-expand"></i>
																	</span>
                                                <span class="nav-text">{{admin('Others')}}</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content mt-5" id="myTabContent1">
                                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab-1">
                                            <div class="form-group row">
                                                @foreach(config('translatable.locales') as $locale)
                                                <div class="col-lg-6">
                                                        <label>{{ admin('Name') . " " . admin($locale)}}</label>
                                                        <span style="color: red;"> * </span>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="name_{{ $locale }}" value="{{$data->getOriginal('name')[$locale]}}">
                                                        </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group row">
                                                @foreach(config('translatable.locales') as $locale)
                                                <div class="col-lg-6">
                                                    <label>{{ admin('Description')}}</label>
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="description_{{ $locale }}" rows="8" cols="150">{{ $data->getOriginal('description')[$locale] }}</textarea>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab-1">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Email')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="email" value="{{$data->email}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Mobile')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="mobile" value="{{$data->mobile}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Fax')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="fax" value="{{$data->fax}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Technical Support Number')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="telephone" value="{{$data->telephone}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="social-1" role="tabpanel" aria-labelledby="social-tab-1">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('WhatsApp')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="whatsapp" value="{{$data->whatsapp}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Viber')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="viber" value="{{$data->viber}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Facebook')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="facebook" value="{{$data->facebook}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Twitter')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="twitter" value="{{$data->twitter}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Instagram')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="instagram" value="{{$data->instagram}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('SnapChat')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="snapchat" value="{{$data->snapchat}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('LinkedIn')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="linkedin" value="{{$data->linkedin}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Google')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="google" value="{{$data->google}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="others-1" role="tabpanel" aria-labelledby="others-tab-1">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Android App Url')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="android_url" value="{{$data->android_url}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Ios App Url')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ios_url" value="{{$data->ios_url}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                @foreach(config('translatable.locales') as $locale)
                                                    <div class="col-lg-6">
                                                        <label>{{ admin('Footer Description')}}</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="footer_description_{{ $locale }}" rows="8" cols="150">{{ $data->getOriginal('footer_description')[$locale] }}</textarea>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div> <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('App Ratio')}}</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" min="0" step="0.01" name="app_ratio" value="{{$data->app_ratio}}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 ml-lg-auto" align="center">
                                            <button  type="submit" id="save"
                                                     class="btn btn-success btn-elevate">{{admin('Save')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>


@endsection
@section('scripts')
    <script>
        var KTFormControls = function () {
            // Private functions
            var edit = function () {
                var validation = FormValidation.formValidation(
                    document.getElementById('edit_form'),
                    {
                        fields: {

                            ar_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Arabic Name is required')}}"
                                    },
                                    stringLength: {
                                        min:2,
                                        message: "{{admin('Arabic Name at least must be 2 digits')}}"
                                    }
                                }
                            },

                            en_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('English Name is required')}}"
                                    },
                                    stringLength: {
                                        min:2,
                                        message: "{{admin('English Name at least must be 2 digits')}}"
                                    }
                                }
                            },

                        },

                        plugins: { //Learn more: https://formvalidation.io/guide/plugins
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap(),
                            // Validate fields when clicking the Submit button
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            // Submit the form when all fields are valid
                            // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        }
                    }
                );
                $('#save').on('click', function (e) {
                    e.preventDefault();

                    validation.validate().then(function(status) {
                        $("#save").click(function(){
                            $("#save").addClass("spinner  spinner-right spinner-sm spinner-ligh");
                            document.getElementById("save").disabled = true;
                        });
                        if (status == 'Valid') {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: "{{ route('admin.settings.general.update') }}",
                                data: new FormData($("#edit_form")[0]),
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
                                            $(location).attr('href', '');
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
                                        $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                                        document.getElementById("save").disabled = false;
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

                                    $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                                    document.getElementById("save").disabled = false;


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
                            toastr.error('{{admin('Please, Insert All Required Items Correctly')}}');
                            $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                            document.getElementById("save").disabled = false;
                        }
                    });
                });
            }

            return {
                // public functions
                init: function() {
                    edit();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormControls.init();
        });

    </script>
@endsection
