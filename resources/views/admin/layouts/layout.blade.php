<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Best | @yield('title')</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
        var ADMIN_BASE_URL = "{{ URL::to('/') }}/admin";
        var BASE_URL = "{{ URL::to('/') }}";
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>
    {{Html::style(CUSTOM_PATH.'/fullcalendar/fullcalendar.bundle.css')}}
    {{Html::style(GENERAL_PATH.'/perfect-scrollbar/css/perfect-scrollbar.css')}}
    {{Html::style(GENERAL_PATH.'/tether/dist/css/tether.css')}}
    {{Html::style(GENERAL_PATH.'/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}
    {{Html::style(GENERAL_PATH.'/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}
    {{Html::style(GENERAL_PATH.'/bootstrap-timepicker/css/bootstrap-timepicker.css')}}
    {{Html::style(GENERAL_PATH.'/bootstrap-daterangepicker/daterangepicker.css')}}
    {{Html::style(GENERAL_PATH.'/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}
    {{Html::style(GENERAL_PATH.'/bootstrap-select/dist/css/bootstrap-select.css')}}
    {{Html::style(GENERAL_PATH.'/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}
    {{Html::style(GENERAL_PATH.'/select2/dist/css/select2.css')}}
    {{Html::style(GENERAL_PATH.'/ion-rangeslider/css/ion.rangeSlider.css')}}
    {{Html::style(GENERAL_PATH.'/nouislider/distribute/nouislider.css')}}
    {{Html::style(GENERAL_PATH.'/owl.carousel/dist/assets/owl.carousel.css')}}
    {{Html::style(GENERAL_PATH.'/owl.carousel/dist/assets/owl.theme.default.css')}}
    {{Html::style(GENERAL_PATH.'/dropzone/dist/dropzone.css')}}
    {{Html::style(GENERAL_PATH.'/summernote/dist/summernote.css')}}
    {{Html::style(GENERAL_PATH.'/bootstrap-markdown/css/bootstrap-markdown.min.css')}}
    {{Html::style(GENERAL_PATH.'/toastr/build/toastr.css')}}
    {{Html::style(GENERAL_PATH.'/morris.js/morris.css')}}
    {{Html::style(GENERAL_PATH.'/sweetalert2/dist/sweetalert2.css')}}
    {{Html::style(GENERAL_PATH.'/socicon/css/socicon.css')}}
    {{Html::style(CUSTOM_PATH.'/vendors/line-awesome/css/line-awesome.css')}}
    {{Html::style(CUSTOM_PATH.'/vendors/flaticon/flaticon.css')}}
    {{Html::style(CUSTOM_PATH.'/vendors/flaticon2/flaticon.css')}}
    {{Html::style(CUSTOM_PATH.'/vendors/fontawesome5/css/all.min.css')}}
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    @stack('css')
    {{Html::style(ASSETS_PATH.'/demo/demo12/base/style.bundle.css')}}
    {{Html::style(ASSETS_PATH.'/style-custom.css')}}
    {{Html::script(GENERAL_PATH.'/jquery/dist/jquery.js')}}
    <link rel="shortcut icon" href="{{asset('adminasset/assets/media/logos/favicon.ico')}}" />
</head>

<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="{{route('admin.dashboard.index')}}">
                <h5 style="color:#a2a3b7;">BEST</h5>
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="{{route('admin.dashboard.index')}}">
                            <h5 style="color:#a2a3b7;">BEST</h5>
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
                    </div>
                </div>
                @include('admin.include.sidebar')
            </div>
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">

                        </div>
                    </div>
                    @include('admin.include.header')
                </div>
                @yield('content')
                @include('admin.include.footer')
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#2c77f4",
                    "light": "#ffffff",
                    "dark": "#282a3c",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>

    {{Html::script(GENERAL_PATH.'/popper.js/dist/umd/popper.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap/dist/js/bootstrap.min.js')}}
    {{Html::script(GENERAL_PATH.'/js-cookie/src/js.cookie.js')}}
    {{Html::script(GENERAL_PATH.'/moment/min/moment.min.js')}}
    {{Html::script(GENERAL_PATH.'/tooltip.js/dist/umd/tooltip.min.js')}}
    {{Html::script(GENERAL_PATH.'/perfect-scrollbar/dist/perfect-scrollbar.js')}}
    {{Html::script(GENERAL_PATH.'/sticky-js/dist/sticky.min.js')}}
    {{Html::script(GENERAL_PATH.'/wnumb/wNumb.js')}}
    {{Html::script(GENERAL_PATH.'/jquery-form/dist/jquery.form.min.js')}}
    {{Html::script(GENERAL_PATH.'/block-ui/jquery.blockUI.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}
    {{Html::script(CUSTOM_PATH.'/components/vendors/bootstrap-datepicker/init.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}
    {{Html::script(CUSTOM_PATH.'/components/vendors/bootstrap-timepicker/init.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-daterangepicker/daterangepicker.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-maxlength/src/bootstrap-maxlength.js')}}
    {{Html::script(CUSTOM_PATH.'/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-select/dist/js/bootstrap-select.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-switch/dist/js/bootstrap-switch.js')}}
    {{Html::script(CUSTOM_PATH.'/components/vendors/bootstrap-switch/init.js')}}
    {{Html::script(GENERAL_PATH.'/select2/dist/js/select2.full.js')}}
    {{Html::script(GENERAL_PATH.'/ion-rangeslider/js/ion.rangeSlider.js')}}
    {{Html::script(GENERAL_PATH.'/typeahead.js/dist/typeahead.bundle.js')}}
    {{Html::script(GENERAL_PATH.'/handlebars/dist/handlebars.js')}}
    {{Html::script(GENERAL_PATH.'/inputmask/dist/jquery.inputmask.bundle.js')}}
    {{Html::script(GENERAL_PATH.'/inputmask/dist/inputmask/inputmask.date.extensions.js')}}
    {{Html::script(GENERAL_PATH.'/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}
    {{Html::script(GENERAL_PATH.'/nouislider/distribute/nouislider.js')}}
    {{Html::script(GENERAL_PATH.'/owl.carousel/dist/owl.carousel.js')}}
    {{Html::script(GENERAL_PATH.'/autosize/dist/autosize.js')}}
    {{Html::script(GENERAL_PATH.'/clipboard/dist/clipboard.min.js')}}
    {{Html::script(GENERAL_PATH.'/dropzone/dist/dropzone.js')}}
    {{Html::script(GENERAL_PATH.'/summernote/dist/summernote.js')}}
    {{Html::script(GENERAL_PATH.'/markdown/lib/markdown.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-markdown/js/bootstrap-markdown.js')}}
    {{Html::script(CUSTOM_PATH.'/components/vendors/bootstrap-markdown/init.js')}}
    {{Html::script(GENERAL_PATH.'/bootstrap-notify/bootstrap-notify.min.js')}}
    {{Html::script(CUSTOM_PATH.'/components/vendors/bootstrap-notify/init.js')}}
    {{Html::script(GENERAL_PATH.'/jquery-validation/dist/jquery.validate.js')}}
    {{Html::script(GENERAL_PATH.'/jquery-validation/dist/additional-methods.js')}}
    {{Html::script(CUSTOM_PATH.'/components/vendors/jquery-validation/init.js')}}
    {{Html::script(GENERAL_PATH.'/toastr/build/toastr.min.js')}}
    {{Html::script(GENERAL_PATH.'/raphael/raphael.js')}}
    {{Html::script(GENERAL_PATH.'/morris.js/morris.js')}}
    {{Html::script(GENERAL_PATH.'/chart.js/dist/Chart.bundle.js')}}
    {{Html::script(CUSTOM_PATH.'/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}
    {{Html::script(CUSTOM_PATH.'/vendors/jquery-idletimer/idle-timer.min.js')}}
    {{Html::script(GENERAL_PATH.'/waypoints/lib/jquery.waypoints.js')}}
    {{Html::script(GENERAL_PATH.'/counterup/jquery.counterup.js')}}
    {{Html::script(GENERAL_PATH.'/es6-promise-polyfill/promise.min.js')}}
    {{Html::script(GENERAL_PATH.'/sweetalert2/dist/sweetalert2.min.js')}}
    {{Html::script(CUSTOM_PATH.'/components/vendors/sweetalert2/init.js')}}
    {{Html::script(GENERAL_PATH.'/jquery.repeater/src/lib.js')}}
    {{Html::script(GENERAL_PATH.'/jquery.repeater/src/jquery.input.js')}}
    {{Html::script(GENERAL_PATH.'/jquery.repeater/src/repeater.js')}}
    {{Html::script(GENERAL_PATH.'/dompurify/dist/purify.js')}}
    {{Html::script(ASSETS_PATH.'/demo/demo12/base/scripts.bundle.js')}}
    {{Html::script(CUSTOM_PATH.'/fullcalendar/fullcalendar.bundle.js')}}
    {{Html::script(CUSTOM_PATH.'/gmaps/gmaps.js')}}
    {{Html::script(ASSETS_PATH.'/app/custom/general/dashboard.js')}}
    {{Html::script(ASSETS_PATH.'/app/bundle/app.bundle.js')}}
    {{-- {{Html::script(ASSETS_PATH.'/treetable/js/javascript.js')}} --}}
    {{Html::script(ASSETS_PATH.'/tabletree/jquery.treetable.js')}}
    {{Html::script(ASSETS_PATH.'/treeview/treeview.js')}}

    {{Html::script(ASSETS_PATH.'/app/custom/general/crud/forms/validation/form-controls.js')}}
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $("#example-basic-expandable").treetable({ expandable: true })
    </script>
    @stack('js')
    @stack('scripts')
    {{Html::script(ASSETS_PATH.'/custom/js/custom.js')}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kt_select2_1').select2();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableList').DataTable({
                "scrollX": true
            });
            $('#exerciseTableList').DataTable({
                "scrollX": true,
                "pageLength": 100,
                "sort":false,
                'columnDefs': [
                    {
                    "targets": 0, // your case first column
                    "className": "text-center"
                    },
                ]
            });
        });
    </script>

    <script type="text/javascript">
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @endif


        @if(Session::has('warning'))
        //toastr.warning("{{ Session::get('warning') }}");
        @endif

        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
</body>

</html>
