@extends('layouts.master')
@section('pageTitle')
    {{web('Categories')}}
@endsection
@section('styles')
    <link href="{{asset('/assets/plugins/custom/datatables/datatables.bundle.'.direction('.').'css')}}"
          rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            <a class="text-dark" href="{{route('home')}}">{{web('Home')}}</a>
                        </h5>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>

                        <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark"
                                 href="{{route('categories.index')}}">{{web('Categories')}}</a>
                        </span>
                        </div>

                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <div class="input-icon input-icon-right">
                        <input type="text" class="form-control" placeholder="{{web('Search')}}..."
                               id="generalSearch">
                        <span class="input-icon input-icon-right"><span>
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1"
                                                             class="kt-svg-icon">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path
                                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																<path
                                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                    fill="#000000" fill-rule="nonzero"/>
															</g>
														</svg>

                                <!--<i class="flaticon2-search-1"></i>-->
													</span></span>
                    </div>

                </div>
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
											<span class="card-icon">
												<i class="fa fa-tags"></i>
											</span>
                            <h3 class="card-label">{{web('Categories')}}</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-md">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<path
                                                                d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                fill="#000000" opacity="0.3"/>
															<path
                                                                d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                fill="#000000"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>{{web('Export')}}</button>
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">{{admin('Choose an option')}}</li>
                                        <li class="navi-item">
                                            <a href="#" id="export_print" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-print"></i>
																</span>
                                                <span class="navi-text">{{web('Print')}}</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" id="export_copy" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-copy"></i>
																</span>
                                                <span class="navi-text">{{web('Copy')}}</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" id="export_excel" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-excel-o"></i>
																</span>
                                                <span class="navi-text">{{web('Excel')}}</span>
                                            </a>
                                        </li>
                                        {{--                                        <li class="navi-item">--}}
                                        {{--                                            <a href="#" id="export_csv" class="navi-link">--}}
                                        {{--																<span class="navi-icon">--}}
                                        {{--																	<i class="la la-file-text-o"></i>--}}
                                        {{--																</span>--}}
                                        {{--                                                <span class="navi-text">{{admin('CSV')}}</span>--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </li>--}}
                                        {{--                                        <li class="navi-item">--}}
                                        {{--                                            <a href="#" id="export_pdf" class="navi-link">--}}
                                        {{--																<span class="navi-icon">--}}
                                        {{--																	<i class="la la-file-pdf-o"></i>--}}
                                        {{--																</span>--}}
                                        {{--                                                <span class="navi-text">{{admin('PDF')}}</span>--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </li>--}}
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                            <!--end::Dropdown-->
                            <!--begin::Button-->
                            <a href="{{route('categories.create')}}"
                               class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<circle fill="#000000" cx="9" cy="15" r="6"/>
														<path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3"/>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>{{web('New Record')}}</a>
                            <!--end::Button-->
                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-striped table-bordered table-hover table-checkable " id="kt_datatable"
                               style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{web('Name')}}</th>
                                <th>{{web('parent')}}</th>
                               <th>{{admin('Image')}}</th>
                                <th>{{admin('Status')}}</th>
                                <th>{{web('Actions')}}</th>
                            </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>


@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script>
        var KTDatatablesExtensionButtons = function () {

            var initTable1 = function () {
                var table = $('#kt_datatable');

                // begin first table
                table.DataTable({

                    responsive: true,
                    searching: false,
                    processing: true,
                    serverSide: true,
                    "language": {
                        "url": "{{app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json':''}}"
                    },
                    buttons: [
                        $.extend(true, {}, {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        })
                    ],

                    "ajax": {
                        url: "{{route('categories.load')}}",
                        data: function (d) {
                            d.search = $("#generalSearch").val();
                        },
                    },
                    columns: [
                        {data: 'id', "className": "text-center"},
                        {data: 'name', "className": "text-center", orderable: false,},
                        {data: 'parent', "className": "text-center", orderable: false,},
                        {data: 'icon', "className": "text-center"},
                        {data: 'status', "className": "text-center"},
                        {data: 'actions', "className": "text-center", responsivePriority: -1, orderable: false,},
                    ],
                    columnDefs: [
                        {
                            targets: -1,

                            render: function (data, type, full, meta) {
                                var x = '<a  href="/categories/edit/' + full.id + '" type="submit" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-success btn-elevate btn-pill btn-elevate-air la la-edit fa-lg" id="edit_btn" title="{{web('Edit')}}"></a>';
                                x = x + '<button type="submit" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-danger btn-elevate btn-pill btn-elevate-air la la-window-close fa-lg" id="delete_btn" title="{{web('Delete')}}"></button>';
                                if (full.status == 'on') {
                                    x = x + '<button type="submit" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-warning btn-elevate btn-pill btn-elevate-air la la-stop-circle fa-lg" id="disable_btn" title="{{web('Disable')}}"></button>';

                                } else if (full.status == 'off') {
                                    x = x + '<button type="submit" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-primary btn-elevate btn-pill btn-elevate-air la la-check-circle  fa-lg" id="activate_btn" title="{{web('Activate')}}"></button>';
                                }
                                return x;

                            },
                        },
                        {
                            targets: -2,
                            render: function (data, type, full, meta) {
                                var status = {
                                    on: {'title': "{{web('Active')}}", 'class': 'label-light-success'},
                                    off: {'title': "{{web('InActive')}}", 'class': 'label-light-danger'},
                                };
                                if (typeof status[data] === 'undefined') {
                                    return data;
                                }
                                return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                            },
                        },
                        {
                            targets: -3,
                            render: function (data, type, full, meta) {
                                return '<img src="' + full.icon + '" class="kt-img-rounded" style="width: 50px;height: 50px;" />';
                            },
                        },
                    ],
                });


                function throttle(f, delay) {
                    var timer = null;
                    return function () {
                        var context = this, args = arguments;
                        clearTimeout(timer);
                        timer = window.setTimeout(function () {
                                f.apply(context, args);
                            },
                            delay || 500);
                    };
                }

                $('#generalSearch').keyup(throttle(function () {
                    // do the search if criteria is met
                    table.DataTable().draw(true);
                }));

                $('#export_print').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(0).trigger();

                });

                $('#export_copy').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(1).trigger();
                });

                $('#export_excel').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(2).trigger();
                });

                $('#export_csv').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(3).trigger();
                });

                $('#export_pdf').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(4).trigger();
                });
            };

            return {

                //main function to initiate the module
                init: function () {
                    initTable1();
                },

            };

        }();

        jQuery(document).ready(function () {
            KTDatatablesExtensionButtons.init();
        });
    </script>

    <script>

        $('#kt_datatable').on('click', 'td button', function (event) {
            console.log('hi');
            var table = $('#kt_datatable').DataTable();
            var data = table.row($(this).parents('tr')).data();
            if (event.target.id == "delete_btn") {
                Swal.fire({
                    title: "{{web('Are you sure !!')}}",
                    text: "{{web('Are you want to delete this item ??')}}",
                    icon: "error",
                    showCancelButton: true,
                    confirmButtonText: "{{web('Sure')}}",
                    cancelButtonText: "{{web('Cancel')}}",

                }).then(function (result) {
                    if (result.value === true) {
                        swal.close();
                        removeTableRow(data['id'], swal);
                    }
                })

            } else if (event.target.id == "disable_btn") {
                swal.fire({
                    title: "{{web('Are you sure !!')}}",
                    text: "{{web('Are you want to disable this item ??')}}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{web('Sure')}}",
                    cancelButtonText: "{{web('Cancel')}}",

                }).then(function (result) {
                    if (result.value === true) {
                        swal.close();
                        disableTableRow(data['id'], swal);
                    }
                })
            } else if (event.target.id == "activate_btn") {
                swal.fire({
                    title: "{{web('Are you sure !!')}}",
                    text: "{{web('Are you want to activate this item ??')}}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{web('Sure')}}",
                    cancelButtonText: "{{web('Cancel')}}",

                }).then(function (result) {
                    if (result.value === true) {
                        swal.close();
                        activateTableRow(data['id'], swal);
                    }
                })

            }
        });

        function removeTableRow(id, swal) {
            var table = $('#kt_datatable').DataTable();
            $.ajax({
                url: "categories/delete",
                type: "post",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function () {
                    swal.fire("{{web('Success Operation.')}}", "{{web('Delete is happened.')}}", "success");
                    table.ajax.reload();
                },
                error: function (err) {
                    swal.fire("{{web('Wrong Operation !')}}", "{{web('Delete is not happened !')}}", "error");
                    table.ajax.reload();
                }
            });
        }

        function disableTableRow(id, swal) {
            var table = $('#kt_datatable').DataTable();
            $.ajax({
                url: "/categories/disable",
                type: "post",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function () {
                    swal.fire("{{web('Success Operation.')}}", "{{web('Disable is happened.')}}", "success");
                    table.ajax.reload();

                },
                error: function (err) {
                    swal.fire("{{web('Wrong Operation !')}}", "{{web('Disable is not happened !')}}", "error");
                    table.ajax.reload();
                }
            });
        }

        function activateTableRow(id, swal) {
            var table = $('#kt_datatable').DataTable();
            $.ajax({
                url: "/categories/activate",
                type: "post",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function () {
                    swal.fire("{{web('Success Operation.')}}", "{{web('Activate is happened.')}}", "success");
                    table.ajax.reload();

                },
                error: function (err) {
                    swal.fire("{{web('Wrong Operation !')}}", "{{web('Activate is not happened !')}}", "error");
                    table.ajax.reload();
                }
            });
        }


    </script>

@endsection
