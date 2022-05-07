@extends('layouts.master')
@section('pageTitle')
    {{admin('Edit')}}
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
                        <a class="text-dark" href="{{route('home')}}">{{web('Home')}}</a>
                    </h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center mt-2 mb-2 mr-5" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                             <a class="text-dark"
                                href="{{route('recipes.index')}}">{{web('recipes ')}}</a>
                        </span>
                    </div>
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark" href="{{route('recipes.edit',$recipe->id)}}">{{$recipe->title}}</a>
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
                                <h3 class="card-title"> {{$recipe->title}}</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" id="edit_form">
                                <div class="card-body">
                                    <!--begin: Code-->
                                    <input type="hidden" name="id"
                                           value="{{$recipe->id}}">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{web('Name')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="title" value="{{ $recipe->title }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{web('Description ')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <textarea class="form-control summernote" id="description" name="description" rows="4"
                                                          cols="150">{{ $recipe->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label class="">{{web('kitchen')}}</label>
                                                <span style="color: red;"> * </span>
                                                <div class="input-group">
                                                    <select
                                                        class="form-control form-control-lg form-control-solid select2"
                                                        id="kitchen_id"
                                                        name="kitchen_id">
                                                        <option value="{{$recipe->kitchen_id}}"
                                                            selected="@if ($recipe->kitchen_id != null)
                                                                selected
                                                            @endif"> {{@$recipe->kitchen->name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="">{{web('category')}}</label>
                                                <span style="color: red;"> * </span>
                                                <div class="input-group">
                                                    <select
                                                        class="form-control form-control-lg form-control-solid select2"
                                                        id="category_id"
                                                        name="category_id">
                                                        <option value="{{$recipe->category_id}}"
                                                            selected="@if ($recipe->category_id != null)
                                                                selected
                                                            @endif"> {{@$recipe->category->name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="">{{web('occasions')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <select
                                                    class="form-control form-control-lg form-control-solid select2"
                                                    id="occasion_id"
                                                    name="occasion_id">
                                                    <option value="{{$recipe->occasion_id}}"
                                                        selected="@if ($recipe->occasion_id != null)
                                                            selected
                                                        @endif"> {{@$recipe->occasion->name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                       <div class="col-lg-6">
                                            <label>{{web('Status')}}</label>
                                           <div class="input-group">
                                                <span class="switch ">
                                                <label>
                                                   <input type="checkbox" name="status" <?= $recipe->status == 'published' ? 'checked' : ''?>>
                                                   <span></span>
                                                </label>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Image')}}</label>
                                            <div class="input-group">
                                                <div class="image-input image-input-empty image-input-outline"
                                                     id="kt_user_edit_avatar"
                                                     style="background-image: url('{{$recipe->main_image}}')">
                                                    <div class="image-input-wrapper"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="main_image"
                                                               accept=".png, .jpg, .jpeg, .svg"/>
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
                                            <label>{{web('cooking_time')}}</label>
                                            <span style="color: red;"> * الوقت بالدقائق </span>
                                            <div class="input-group">
                                                <input type="number" min="1" class="form-control" name="cooking_time" value="{{ $recipe->cooking_time }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{web('number_of_people')}}</label>
                                            <span style="color: red;"> *  </span>
                                            <div class="input-group">
                                                <input type="number" min="1" class="form-control" name="number_of_people" value="{{ $recipe->number_of_people }}">
                                            </div>
                                        </div>
                                   </div>
                                   <div id="kt_repeater_1">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-right">{{ web('Ingredients') }}</label>
                                        <div data-repeater-list="ingredients" class="col-lg-10">
                                            @foreach ($recipe->ingredients as $ingredient )
                                            <div data-repeater-item="" class="form-group row align-items-center">
                                                <div class="col-md-6">
                                                    <input type="text" name='ingredients[number][input]' value="{{ $ingredient }}" class="form-control" placeholder="Enter full name">
                                                    <div class="d-md-none mb-2"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-right"></label>
                                        <div class="col-lg-4">
                                            <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>Add</a>
                                        </div>
                                    </div>
                                   </div>
                                   <div id="kt_repeater_2">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-right">{{ web('prepares') }}</label>
                                        <div data-repeater-list="prepares" class="col-lg-10">
                                            @foreach ($recipe->prepares as $prepares )
                                              <div data-repeater-item="" class="form-group row align-items-center">
                                                <div class="col-md-6">
                                                    <input type="text" name='prepares[number][input]' class="form-control" value="{{ $prepares }}" placeholder="Enter full name">
                                                    <div class="d-md-none mb-2"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-right"></label>
                                        <div class="col-lg-4">
                                            <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>Add</a>
                                        </div>
                                    </div>
                                   </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 ml-lg-auto" align="center">
                                            <button  type="submit" id="save"
                                                     class="btn btn-success btn-elevate">{{web('Save')}}</button>
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
            $('#kitchen_id').select2({
            placeholder: "{{web('Choose')}}"
        });
        $('#category_id').select2({
            placeholder: "{{web('Choose')}}"
        });
        $('#occasion_id').select2({
            placeholder: "{{web('Choose')}}"
        });
        $(document).ready(function () {

            feedKitchens();
            feedCategories();
            feedOccasions();
            $("#kitchen_id").on("change", function (e) {
                e.preventDefault();
            });
            $("#category_id").on("change", function (e) {
                e.preventDefault();
            });
            $("#occasion_id").on("change", function (e) {
                e.preventDefault();
            });
            function feedKitchens(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#kitchen_id').select2({
                    placeholder: '{{web('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url:  '{{route('recipes.kitchens')}}',
                        dataType: 'json',
                        delay: 250,
                        cache: false,
                        data: function (params) {
                            return {
                                myData: myData,
                                search: params.term,
                                page: params.page || 1
                            };
                        },
                        processResults: function (data) {
                            data.page = data.page || 1;
                            return {
                                results: data.items.map(function (item) {
                                    return {
                                        id: item.id,
                                        text:  item.name,
                                    }
                                }),
                                pagination: {
                                    more: data.pagination
                                }
                            };
                        },

                    },
                });
            }
            function feedCategories(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#category_id').select2({
                    placeholder: '{{web('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url:  '{{route('recipes.categories')}}',
                        dataType: 'json',
                        delay: 250,
                        cache: false,
                        data: function (params) {
                            return {
                                myData: myData,
                                search: params.term,
                                page: params.page || 1
                            };
                        },
                        processResults: function (data) {
                            data.page = data.page || 1;
                            return {
                                results: data.items.map(function (item) {
                                    return {
                                        id: item.id,
                                        text:  item.name,
                                    }
                                }),
                                pagination: {
                                    more: data.pagination
                                }
                            };
                        },

                    },
                });
            }
            function feedOccasions(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#occasion_id').select2({
                    placeholder: '{{web('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url:  '{{route('recipes.occasions')}}',
                        dataType: 'json',
                        delay: 250,
                        cache: false,
                        data: function (params) {
                            return {
                                myData: myData,
                                search: params.term,
                                page: params.page || 1
                            };
                        },
                        processResults: function (data) {
                            data.page = data.page || 1;
                            return {
                                results: data.items.map(function (item) {
                                    return {
                                        id: item.id,
                                        text:  item.name,
                                    }
                                }),
                                pagination: {
                                    more: data.pagination
                                }
                            };
                        },

                    },
                });
            }
        });
        
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
                                        message: "{{web('Arabic Name is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{web('Arabic Name at least must be 2 digits')}}"
                                    }
                                }
                            },

                            en_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{web('English Name is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{web('English Name at least must be 2 digits')}}"
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
                                url: "{{ route('recipes.update') }}",
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
                                            $(location).attr('href', '{{route('recipes.index')}}');
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
                            toastr.error('{{web('Please, Insert All Required Items Correctly')}}');
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
