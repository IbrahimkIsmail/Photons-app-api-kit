@extends('layouts.master')
@section('pageTitle')
    {{web('Home')}}
@endsection
@section('styles')

@endsection
@section('content')
    @if ($message = Session::get('permission'))

        <script>
            toastr.info('Are you the 6 fingered man?')
        </script>

    @endif
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div
                class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        <a class="text-dark" href="{{route('home')}}">{{web('Home')}}</a>
                    </h5>
                    <!--end::Page Title-->
                    <!--begin::Actions-->
                {{--                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>--}}
                {{--                    <span class="text-muted font-weight-bold mr-4">#XRS-45670</span>--}}
                <!--end::Actions-->
                </div>
                <!--end::Info-->

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-4">
                        <!--begin::Mixed Widget 16-->
                        <div class="card card-custom gutter-b card-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <div class="card-title font-weight-bolder">
                                    <div class="card-label">{{ web('Weekly Sales Stats') }}
                                        <div class="font-size-sm text-muted mt-2">890,344 {{ web('Sales') }} </div></div>
                                </div>
                                <div class="card-toolbar">
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column" style="position: relative;">
                                <!--begin::Chart-->
                                <div id="kt_mixed_widget_16_chart" style="height: 200px; min-height: 200.7px;"><div id="apexchartsj5sql1zi" class="apexcharts-canvas apexchartsj5sql1zi apexcharts-theme-light" style="width: 270px; height: 200.7px;"><svg id="SvgjsSvg3377" width="270" height="200.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG3379" class="apexcharts-inner apexcharts-graphical" transform="translate(48, 0)"><defs id="SvgjsDefs3378"><clipPath id="gridRectMaskj5sql1zi"><rect id="SvgjsRect3381" width="182" height="200" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskj5sql1zi"><rect id="SvgjsRect3382" width="180" height="202" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG3384" class="apexcharts-radialbar"><g id="SvgjsG3385"><g id="SvgjsG3386" class="apexcharts-tracks"><g id="SvgjsG3387" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 88 24.937560975609756 A 74.06243902439024 74.06243902439024 0 1 1 87.98707366593528 24.937562103645206" fill="none" fill-opacity="1" stroke="rgba(243,246,249,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 24.937560975609756 A 74.06243902439024 74.06243902439024 0 1 1 87.98707366593528 24.937562103645206"></path></g><g id="SvgjsG3389" class="apexcharts-radialbar-track apexcharts-track" rel="2"><path id="apexcharts-radialbarTrack-1" d="M 88 37.619512195121956 A 61.380487804878044 61.380487804878044 0 1 1 87.98928708396762 37.61951313000024" fill="none" fill-opacity="1" stroke="rgba(243,246,249,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 37.619512195121956 A 61.380487804878044 61.380487804878044 0 1 1 87.98928708396762 37.61951313000024"></path></g><g id="SvgjsG3391" class="apexcharts-radialbar-track apexcharts-track" rel="3"><path id="apexcharts-radialbarTrack-2" d="M 88 50.301463414634156 A 48.698536585365844 48.698536585365844 0 1 1 87.99150050199997 50.30146415635528" fill="none" fill-opacity="1" stroke="rgba(243,246,249,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 50.301463414634156 A 48.698536585365844 48.698536585365844 0 1 1 87.99150050199997 50.30146415635528"></path></g><g id="SvgjsG3393" class="apexcharts-radialbar-track apexcharts-track" rel="4"><path id="apexcharts-radialbarTrack-3" d="M 88 62.98341463414636 A 36.01658536585364 36.01658536585364 0 1 1 87.9937139200323 62.98341518271032" fill="none" fill-opacity="1" stroke="rgba(243,246,249,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 62.98341463414636 A 36.01658536585364 36.01658536585364 0 1 1 87.9937139200323 62.98341518271032"></path></g></g><g id="SvgjsG3395"><g id="SvgjsG3399" class="apexcharts-series apexcharts-radial-series" seriesName="Progress" rel="1" data:realIndex="0"><path id="SvgjsPath3400" d="M 88 24.937560975609756 A 74.06243902439024 74.06243902439024 0 1 1 44.467190592652884 158.91777181559002" fill="none" fill-opacity="0.85" stroke="rgba(137,80,252,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="216" data:value="60" index="0" j="0" data:pathOrig="M 88 24.937560975609756 A 74.06243902439024 74.06243902439024 0 1 1 44.467190592652884 158.91777181559002"></path></g><g id="SvgjsG3401" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx2" rel="2" data:realIndex="1"><path id="SvgjsPath3402" d="M 88 37.619512195121956 A 61.380487804878044 61.380487804878044 0 0 1 88 160.38048780487804" fill="none" fill-opacity="0.85" stroke="rgba(246,78,96,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-1" data:angle="180" data:value="50" index="0" j="1" data:pathOrig="M 88 37.619512195121956 A 61.380487804878044 61.380487804878044 0 0 1 88 160.38048780487804"></path></g><g id="SvgjsG3403" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx3" rel="3" data:realIndex="2"><path id="SvgjsPath3404" d="M 88 50.301463414634156 A 48.698536585365844 48.698536585365844 0 1 1 39.301463414634156 99" fill="none" fill-opacity="0.85" stroke="rgba(27,197,189,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-2" data:angle="270" data:value="75" index="0" j="2" data:pathOrig="M 88 50.301463414634156 A 48.698536585365844 48.698536585365844 0 1 1 39.301463414634156 99"></path></g><g id="SvgjsG3405" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx4" rel="4" data:realIndex="3"><path id="SvgjsPath3406" d="M 88 62.98341463414636 A 36.01658536585364 36.01658536585364 0 1 1 53.746191793104224 87.87026304259518" fill="none" fill-opacity="0.85" stroke="rgba(54,153,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-3" data:angle="288" data:value="80" index="0" j="3" data:pathOrig="M 88 62.98341463414636 A 36.01658536585364 36.01658536585364 0 1 1 53.746191793104224 87.87026304259518"></path></g><circle id="SvgjsCircle3396" r="32.17560975609756" cx="88" cy="99" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG3397" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText3398" font-family="Helvetica, Arial, sans-serif" x="88" y="109" text-anchor="middle" dominant-baseline="auto" font-size="18px" font-weight="700" fill="#464e5f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">60%</text></g></g></g></g><line id="SvgjsLine3407" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine3408" x1="0" y1="0" x2="176" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG3380" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
                                <!--end::Chart-->
                                <!--begin::Items-->
                                <div class="mt-10 mb-5">
                                    <div class="row row-paddingless mb-10">
                                        <!--begin::Item-->
                                        <div class="col">
                                            <div class="d-flex align-items-center mr-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
                                                    <div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-info">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																					<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div>
                                                    <div class="font-size-h4 text-dark-75 font-weight-bolder">$2,034</div>
                                                    <div class="font-size-sm text-muted font-weight-bold mt-1">{{ admin('Store sales') }}</div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="col">
                                            <div class="d-flex align-items-center mr-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                                                    <div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-danger">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
																					<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div>
                                                    <div class="font-size-h4 text-dark-75 font-weight-bolder">$706</div>
                                                    <div class="font-size-sm text-muted font-weight-bold mt-1">{{ admin('Restaurant sales') }}</div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <div class="row row-paddingless">
                                        <!--begin::Item-->
                                        <div class="col">
                                            <div class="d-flex align-items-center mr-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
                                                    <div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-success">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																					<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div>
                                                    <div class="font-size-h4 text-dark-75 font-weight-bolder">$49</div>
                                                    <div class="font-size-sm text-muted font-weight-bold mt-1">{{ web('Pharmacy sales') }}</div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="col">
                                            <div class="d-flex align-items-center mr-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                                    <div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"></rect>
																					<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"></path>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div>
                                                    <div class="font-size-h4 text-dark-75 font-weight-bolder">$5.8M</div>
                                                    <div class="font-size-sm text-muted font-weight-bold mt-1">{{ web('All Sales') }}</div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                </div>
                                <!--end::Items-->
                                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 329px; height: 465px;"></div></div><div class="contract-trigger"></div></div></div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 16-->
                    </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 11-->
                                <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                    <div class="card-body">
																<span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"></rect>
																			<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
																			<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3">790</div>
                                        <a href="#" class="text-inverse-success font-weight-bold font-size-lg mt-1">{{ admin('Providers Count') }}</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 11-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b" style="height: 150px">
                                    <div class="card-body">
																<span class="svg-icon svg-icon-3x svg-icon-success">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																			<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">8,600</div>
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">{{ admin('Customers Counts') }}</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 11-->
                                <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                    <div class="card-body">
																<span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"></rect>
																			<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
																			<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3">790</div>
                                        <a href="#" class="text-inverse-success font-weight-bold font-size-lg mt-1">{{ admin('New Providers') }}</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 11-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b" style="height: 150px">
                                    <div class="card-body">
																<span class="svg-icon svg-icon-3x svg-icon-success">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																			<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">8,600</div>
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">{{ admin('New Customers') }}</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 11-->
                                <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                    <div class="card-body">
																<span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"></rect>
																			<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
																			<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3">790</div>
                                        <a href="#" class="text-inverse-success font-weight-bold font-size-lg mt-1">{{ web('New Products') }}</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 11-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b" style="height: 150px">
                                    <div class="card-body">
																<span class="svg-icon svg-icon-3x svg-icon-success">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																			<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{ @$name }}</div>
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">{{ web('Order Counts') }}</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
@section('scripts')

@endsection
