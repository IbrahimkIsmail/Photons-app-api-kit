<!DOCTYPE html>
<html lang="{{app()->getlocale()}}" dir="{{direction()}}">
<!--begin::Head-->
<head>
    <base href="">
    <meta charset="utf-8"/>
    <title>{{web('Dashboard')}} | @yield('pageTitle')</title>
    <meta name="description" content="Updates and statistics"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts-->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
@yield('styles')
<!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('/assets/plugins/global/plugins.bundle.'.direction('.').'css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/assets/plugins/custom/prismjs/prismjs.bundle.'.direction('.').'css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/style.bundle.'.direction('.').'css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('/assets/css/themes/layout/header/base/light.'.direction('.').'css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/assets/css/themes/layout/header/menu/light.'.direction('.').'css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/assets/css/themes/layout/brand/dark.'.direction('.').'css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/assets/css/themes/layout/aside/dark.'.direction('.').'css') }}" rel="stylesheet"
          type="text/css"/>
    <!--end::Layout Themes-->
    <link rel="shortcut icon"  href="{{ asset('/assets/media/logos/logo_s.png') }}"/>
    <style>
        .aside-menu .menu-nav > .menu-item.menu-item-active > .menu-heading, .aside-menu .menu-nav > .menu-item.menu-item-active > .menu-link {
            background-color: #de5c26;
        }

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<!--begin::Header Mobile-->
@include('includes.mobileHeader')

<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
    @include('includes.aside')
    <!--end::Aside-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->

        @include('includes.header')
        <!--end::Header-->
            <!--begin::Content-->

        @yield('content')

        <!--end::Content-->
            <!--begin::Footer-->
        @include('includes.footer')
        <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
						<path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
                <!--end::Svg Icon-->
			</span>
</div>
<!--end::Scrolltop-->

<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200},
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
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>

<!--end::Global Theme Bundle-->

<!--begin::Page Scripts(used by this page)-->
@yield('scripts')

@if ($message = Session::get('permission'))

    <script>
        toastr["error"]('{{$message}}')

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-left",
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
        }
    </script>

@endif
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
