@extends('admin.layouts.master')
@section('pageTitle')
    {{admin('Create')}}
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
                             <a class="text-dark"
                                href="">{{ admin('Pages') }}</a>
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
                                <h3 class="card-title">{{ admin('Add New Page') }}</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" id="edit_form">
                                <div class="card-body">
                                    <!--begin: Code-->
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('key')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="key"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{admin('Type')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <select name="type" class="form-control">
                                                    <option value="user" >{{ admin('User App') }}</option>
                                                    <option value="dealer" >{{ admin('Dealer App') }}</option>
                                                    <option value="web" >{{ admin('Web') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        @foreach(config('translatable.locales') as $locale)
                                            <div class="col-lg-6">
                                                <label>{{ admin('Title') . " " . admin($locale)}}</label>
                                                <span style="color: red;"> * </span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="title_{{ $locale }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group row">
                                        @foreach(config('translatable.locales') as $locale)
                                        <div class="col-lg-6">
                                            <label>{{admin('Content') . " " . admin($locale)}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <textarea class="form-control summernote" id="content_{{ $locale }}" name="content_{{ $locale }}" rows="8"
                                                          cols="150"></textarea>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 ml-lg-auto" align="center">
                                            <button type="submit" id="save"
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
    <script src="{{ asset("/assets/js/pages/custom/user/edit-user.js") }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#content_ar').summernote({
                height: "300px",
            });
            $('#content_en').summernote({
                height: "300px",
            });
        });
    </script>
    <script>
        var KTFormControls = function () {
            // Private functions
            var edit = function () {
                var validation = FormValidation.formValidation(
                    document.getElementById('edit_form'),
                    {
                        fields: {

                            title_ar: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Arabic Title is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('Arabic Title at least must be 2 digits')}}"
                                    }
                                }
                            },

                            title_en: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('English Title is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('English Title at least must be 2 digits')}}"
                                    }
                                }
                            },

                            content_ar: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Arabic Content is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('Arabic Content at least must be 2 digits')}}"
                                    }
                                }
                            },

                            content_en: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('English Content is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('English Content at least must be 2 digits')}}"
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

                    validation.validate().then(function (status) {
                        $("#save").click(function () {
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
                                url: "{{ route('admin.pages.store') }}",
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
                                            $(location).attr('href', '{{route('admin.pages.index')}}');
                                        }, 1500);

                                    } else {
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
                        } else {
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
                init: function () {
                    edit();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTFormControls.init();
        });

    </script>
@endsection
