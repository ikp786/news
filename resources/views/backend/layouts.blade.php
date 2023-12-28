<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>{{ config('constants.Highfly.name') }}
    </title>
    {{-- <link rel="icon" type="image/x-icon" href="{{asset('public/backend/img/highfly_favicon.ico')}}"> --}}
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name=">keywords"
        content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="https://themeselection.com/item/materio-bootstrap-html-admin-template/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    {!! Html::style('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap') !!}
    {!! HTML::style('public/backend/vendor/fonts/materialdesignicons.css') !!}
    {!! HTML::style('public/backend/vendor/fonts/flag-icons.css') !!}
    {!! HTML::style('public/backend/vendor/libs/node-waves/node-waves.css') !!}
    {!! HTML::style('public/backend/vendor/css/rtl/core.css') !!}
    {!! HTML::style('public/backend/vendor/css/rtl/theme-default.css') !!}
    {!! HTML::style('public/backend/css/demo.css') !!}
    {!! HTML::style('public/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') !!}
    {!! HTML::style('public/backend/vendor/libs/typeahead-js/typeahead.css') !!}
    {!! HTML::style('public/backend/vendor/libs/apex-charts/apex-charts.css') !!}
    {!! HTML::style('public/backend/css/associatesCss.css') !!}
 
    {!! HTML::style('public/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') !!}
    {!! HTML::style('public/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') !!}
    {!! HTML::style('public/backend/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') !!}

    {!! HTML::script('public/backend/vendor/js/helpers.js') !!}
    {!! HTML::script('public/backend/vendor/js/template-customizer.js') !!}
    {!! HTML::script('public/backend/js/config.js') !!}
    {!! HTML::script('public/backend/js/forms-typeahead.js') !!}
    {!! HTML::script('public/backend/js/forms-selects.js') !!}
    {!! HTML::script('public/backend/vendor/libs/bloodhound/bloodhound.js') !!}
    {!! HTML::script('public/backend/js/forms-tagify.js') !!}

    {!! HTML::style('public/backend/vendor/libs/bootstrap-select/bootstrap-select.css') !!}
    {!! HTML::style('public/backend/vendor/libs/select2/select2.css') !!}
    {!! HTML::style('public/backend/vendor/libs/flatpickr/flatpickr.css') !!}
    {!! HTML::style('public/backend/vendor/libs/tagify/tagify.css') !!}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') !!}
    <style>
        .profile_pic_list {
            width: 50px;
            height: 50px;
        }
        .panel-heading {
          height: 36px !important;
           }  
            .note-editing-area {
            height: 200px;
            }
            .note-editable {
            height: 100%;
            }

        /* Style for the loader modal */
        .spinner-loader {
            position: fixed;
            background: rgba(0, 0, 0, 0.7);
            /* Use rgba to specify the background color with transparency */
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            text-align: center;
            z-index: 9999;
        }

        /* Style for the blurred background when loader is active */
        .spinner-loader.active {
            backdrop-filter: blur(5px);
            /* Add blur to the background */
        }

        /* Style for the spinner */
        .spinner-border {
            /* Add your spinner styling here */
            /* margin: 200px auto; */
            /* Adjust the margin as needed */
            margin-top: 400px !important;

        }

        .demo-inline-spacing {
            /* margin-top: 470px !important; */
        }

        .float_left {
            float: left;
        }
    </style>
    @stack('style')

</head>

<body>
    </head>

    <body>
        <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0"
                style="display: none; visibility: hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar  ">
            <div class="layout-container">

                <!-- Sie Menu -->
                @include('backend.partials.sidebar')
                <!-- / Side Menu -->

                <!-- Layout container -->
                <div class="layout-page">

                    <!-- Navbar -->

                    @include('backend.partials.header')

                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">

                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">

                            @stack('content')
                            <!-- LOADER -->
                            <div class="spinner-loader" style=" display: none;">
                                <div class="dataTables_processing card" role="status">
                                    <div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        @include('backend.partials.footer')

                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>

            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>

        </div>
        <!-- / Layout wrapper -->

        {!! HTML::script('public/backend/vendor/libs/jquery/jquery.js') !!}
        {!! HTML::script('public/backend/vendor/libs/popper/popper.js') !!}
        {!! HTML::script('public/backend/vendor/js/bootstrap.js') !!}
        {!! HTML::script('public/backend/vendor/libs/node-waves/node-waves.js') !!}
        {!! HTML::script('public/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') !!}
        {!! HTML::script('public/backend/vendor/libs/hammer/hammer.js') !!}
        {!! HTML::script('public/backend/vendor/libs/i18n/i18n.js') !!}
        {!! HTML::script('public/backend/vendor/libs/typeahead-js/typeahead.js') !!}
        {!! HTML::script('public/backend/vendor/js/menu.js') !!}
        {!! HTML::script('public/backend/vendor/libs/apex-charts/apexcharts.js') !!}
        {!! HTML::script('public/backend/js/main.js') !!}
        {!! HTML::script('public/backend/js/dashboards-analytics.js') !!}

        {!! HTML::script('public/backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') !!}
    
        {!! HTML::script('public/backend/vendor/libs/toastr/toastr.js') !!}
        {!! HTML::script('public/backend/vendor/libs/select2/select2.js') !!}
        {!! HTML::script('public/backend/vendor/libs/bootstrap-select/bootstrap-select.js') !!}
        {!! HTML::script('public/backend/vendor/libs/moment/moment.js') !!}
        {!! HTML::script('public/backend/vendor/libs/flatpickr/flatpickr.js') !!}
        {!! HTML::script('public/backend/vendor/libs/tagify/tagify.js') !!}
        
        @include('backend.partials.toastr')
        <script>
            var message = localStorage.getItem('message');
            localStorage.removeItem('message');
            if (message) {
                toastr.success(message);
            }
        </script>
        <script>
            $(document).ready(function () {
                $('.logout-btn').on('click', function (e) {
                    e.preventDefault();                    
                    // Send an AJAX request to the logout route
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("admin.logout") }}',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.status === 200) {
                             toastr.success(response.message);
                                window.location.href = '{{ route("admin.login") }}';
                            } else {
                                 toastr.error(response.message);
                            }
                        },
                        error: function () {
                            toastr.error('Oops... Something went wrong. Please try again.');
                        }
                    });
                });
                $('.spinner-loader').css('display', 'none');
            });
        </script>
        @stack('script')
    </body>

</html>