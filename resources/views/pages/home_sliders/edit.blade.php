@extends('admin.layouts.master')
@section('pageTitle')
    {{admin('New Record')}}
@endsection
@section('styles')
    <link href="{{asset('/assets/css/pages/wizard/wizard-4.'.direction('.').'css')}}"
          rel="stylesheet" type="text/css"/>
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
                    <div class="d-flex align-items-center mt-2 mb-2 mr-5" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                            <a class="text-dark"
                               href="{{route('admin.home_slider.index')}}">{{admin('Home Slider ')}}</a>
                        </span>
                    </div>
                    <!--end::Search Form-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                            <a class="text-dark"
                               href="{{route('admin.home_slider.create')}}">{{admin('New Record')}}</a>
                        </span>
                    </div>
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
                                <h3 class="card-title">{{admin('New Record')}}</h3>
                            </div>

                            <!--begin::Form-->
                            <form class="form" id="add_form">
                                <input type="hidden" name="id"
                                       value="{{$homeSlider->id}}">
                                <div class="card-body">
                                    <!--begin: Code-->
                                    <div class="form-group row">
                                        @foreach(config('translatable.locales') as $locale)
                                            <div class="col-lg-6">
                                                <label>{{ admin('Title') . " " . admin($locale)}}</label>
                                                <span style="color: red;"> * </span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="title_{{ $locale }}" value="{{ $homeSlider->getOriginal('title')[$locale] }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group row">
                                        @foreach(config('translatable.locales') as $locale)
                                            <div class="col-lg-6">
                                                <label>{{ admin('Description') . " " . admin($locale)}}</label>
                                                <span style="color: red;"> * </span>
                                                <div class="input-group">
                                                     <textarea class="form-control summernote" id="description_{{ $locale }}" name="description_{{ $locale }}" rows="4"
                                                               cols="150">{{ $homeSlider->getOriginal('description')[$locale] }}</textarea>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Image')}}</label>
                                            <div class="input-group">
                                                <div class="image-input image-input-empty image-input-outline"
                                                     id="kt_user_edit_avatar"
                                                     style="background-image: url('{{url($homeSlider->image)}}')">
                                                    <div class="image-input-wrapper"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="image"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden" name="profile_avatar_remove"/>
                                                    </label>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip"
                                                        title="Cancel avatar">
                                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                        </span>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="remove" data-toggle="tooltip"
                                                        title="Remove avatar">
                                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{admin('Status')}}</label>
                                            <div class="input-group">
                                                <span class="switch ">
                                                <label>
                                                    <input type="checkbox" name="status" <?= $homeSlider->status == 'active' ? 'checked' : ''?>>
                                                    <span></span>
                                                </label>
                                            </span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group row">

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
    <script>
        var KTFormControls = function () {

            // repeater
            var repeater = function() {
                $('#kt_repeater_3').repeater({
                    initEmpty: false,

                    // defaultValues: {
                    //     'text-input': 'foo'
                    // },

                    show: function() {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        swal.fire({
                            title: "{{admin('Are you sure !!')}}",
                            text: "{{admin('Are you want to delete this item ??')}}",
                            icon: "error",
                            showCancelButton: true,
                            confirmButtonText: "{{admin('Sure')}}",
                            cancelButtonText: "{{admin('Cancel')}}",

                        }).then(function (result) {
                            if (result.value === true) {
                                swal.close();
                                $(this).slideUp(deleteElement);
                                swal.fire("{{admin('Success Operation.')}}", "{{admin('Delete is happened.')}}", "success");

                            }
                        })
                    },

                });
            }

            // Private functions
            var add = function () {
                var validation = FormValidation.formValidation(
                    document.getElementById('add_form'),
                    {
                        fields: {

                            {{--name_ar: {--}}
                            {{--    validators: {--}}
                            {{--        notEmpty: {--}}
                            {{--            message: "{{admin('Arabic Name is required')}}"--}}
                            {{--        },--}}
                            {{--        stringLength: {--}}
                            {{--            min: 2,--}}
                            {{--            message: "{{admin('Arabic Name at least must be 2 digits')}}"--}}
                            {{--        }--}}
                            {{--    }--}}
                            {{--},--}}
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
                                url: "{{ route('admin.home_slider.update') }}",
                                data: new FormData($("#add_form")[0]),
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
                                            $(location).attr('href', '{{route('admin.home_slider.index')}}');
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
                    add();
                    repeater();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTFormControls.init();
        });

    </script>
@endsection
