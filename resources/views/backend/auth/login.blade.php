<!DOCTYPE html>
<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('constants.Highfly.name') }}
        | Login</title>
        <link rel="icon" type="image/x-icon" href="{{asset('public/backend/img/highfly_favicon.ico')}}">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords"
        content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/materio-bootstrap-html-admin-template/">

    <style>
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
        .highfly-logo{
            position: absolute;
    text-align: center;
    align-items: center;
    margin: auto;
    right: 43%;
    top: 29px
}
        
   </style>
  

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap"
        rel="stylesheet">

    <!-- Icons -->
    {!! Html::style('public/backend/vendor/fonts/materialdesignicons.css') !!}
    {!! HTML::style('public/backend/vendor/fonts/flag-icons.css') !!}

    <!-- Menu waves for no-customizer fix -->
    {!! HTML::style('public/backend/vendor/libs/node-waves/node-waves.css') !!}

    <!-- Core CSS -->
    {!! HTML::style('public/backend/vendor/css/rtl/core.css') !!}
    {!! HTML::style('public/backend/vendor/css/rtl/theme-default.css') !!}
    {!! HTML::style('public/backend/css/demo.css') !!}

    <!-- Vendors CSS -->
    {!! HTML::style('public/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') !!}
    {!! HTML::style('public/backend/vendor/libs/typeahead-js/typeahead.css') !!}
    <!-- Vendor -->
    {!! HTML::style('public/backend/vendor/libs/%40form-validation/umd/styles/index.min.css') !!}
    {!! HTML::style('public/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') !!}
    {!! HTML::style('public/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') !!}

    <!-- Page CSS -->
    <!-- Page -->
    {!! HTML::style('public/backend/vendor/css/pages/page-auth.css') !!}

    <!-- Helpers -->
    {!! HTML::script('public/backend/vendor/js/helpers.js') !!}
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    {!! HTML::script('public/backend/vendor/js/template-customizer.js') !!}
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    {!! HTML::script('public/backend/js/config.js') !!}
 
   
</head>

<!-- Content -->
<body>
    <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="highfly-logo">
        
            <img class="ms-2" width="200px"  src="{{asset('public/backend/img/bgLogo.png')}}" alt="">
        </div>
            <div class="authentication-inner py-4">
                <!-- Login -->
                <div class="card p-2">
                    <div id="error" class="text-danger"></div>
                    <div class="card-body ">
                        <h4 class="mb-2">Welcome to News! </h4>
                        
                        {{ Form::model(null, ['route' => ['admin.login.post'], 'role' => 'form', 'id'=>'frmLogin',
                        'method'=>'post']) }}
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email or username" autofocus>
                            <label for="email">Email or Username</label>
                        </div>
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
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me">
                                    Remember Me
                                </label>
                            </div> --}}
                            <a href="auth-forgot-password-basic.html" class="float-end mb-1">
                                <span>Forgot Password?</span>
                            </a>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                        {{ Form::close() }}
                        </p>
                    </div>
                </div>
                
            </div>

            </div>
        </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    {!! HTML::script('public/backend/vendor/js/helpers.js') !!}
    {!! HTML::script('public/backend/vendor/libs/jquery/jquery.js') !!}
    {!! HTML::script('public/backend/vendor/libs/popper/popper.js') !!}
    {!! HTML::script('public/backend/vendor/js/bootstrap.js') !!}
    {!! HTML::script('public/backend/vendor/libs/node-waves/node-waves.js') !!}
    {!! HTML::script('public/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') !!}
    {!! HTML::script('public/backend/vendor/libs/hammer/hammer.js') !!}
    {!! HTML::script('public/backend/vendor/libs/i18n/i18n.js') !!}
    {!! HTML::script('public/backend/vendor/libs/typeahead-js/typeahead.js') !!}
    {!! HTML::script('public/backend/vendor/js/menu.js') !!}

    <!-- endbuild -->

    <!-- Vendors JS -->
    {!! HTML::script('public/backend/vendor/libs/%40form-validation/umd/bundle/popular.min.js') !!}
    {!! HTML::script('public/backend/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js') !!}
    {!! HTML::script('public/backend/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js') !!}

    <!-- Main JS -->
    {!! HTML::script('public/backend/js/main.js') !!}


    <!-- Page JS -->
    {!! HTML::script('public/backend/js/pages-auth.js') !!}

    <script>
        $(document).ready(function () {
            $('#frmLogin').on('submit', function (e) {
                e.preventDefault();
    
                var $form = $(this);
                var url = $form.attr('action');
                var formData = new FormData($form[0]);
    
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                $('.spinner-loader').css('display', 'block');
                },
                    success: function (res) {
                $('.spinner-loader').css('display', 'none');

                        if (res.status === 200) {
                            // Redirect or perform other actions upon successful login
                            window.location.href = "{{route('admin.dashboard')}}";
                        } else {
                            // Handle error (display error message, etc.)
                            $('#error').show().html(res.message);
                        }
                    },
                    error: function () {
                $('.spinner-loader').css('display', 'none');
                        $('#error').show().html('Oops... Something went wrong. Please try again.');
                    }
                });
            });
        });
    </script>


    {{-- <script>
        $.ajax({
                url: $("#frmLogin").attr("action"),
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: new FormData(form),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    var message = res.message;
                    if (res.status == 200) {
                        window.location = adminUrl;
                    } else {
                        $("#error").show().html(message);
                        $btn.attr("disabled", false).html($btn.data("text"));
                    }
                },
                error: function (err) {
                    $("#error").show().html("Oops...Something went wrong. Please try again.");
                    $btn.attr("disabled", false).html($btn.data("text"));
                },
            });
    </script> --}}
</body>


<!-- Mirrored from demos.themeselection.com/materio-bootstrap-html-admin-template/html/vertical-menu-template/auth-login-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Aug 2023 11:57:59 GMT -->

</html>

<!-- beautify ignore:end -->