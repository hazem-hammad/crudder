<!DOCTYPE html>
<html lang="en">
<head>
    <title> {{ env('APP_NAME') }} | Login </title>
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ env('APP_NAME') }}"/>
    <meta property="og:url" content="{{ env('APP_URL') }}"/>
    <meta property="og:site_name" content="{{ env('APP_NAME') }}"/>
    <link rel="canonical" href="{{ env('APP_URL') }}"/>
    <link rel="shortcut icon" href="{{ asset('media/logos/logo-icon.png') }}"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/custom.style.css') }}" rel="stylesheet" type="text/css"/>

</head>

<body id="kt_body" class="app-blank">
<div class="d-flex flex-column flex-root" id="kt_app_root">

    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <a class="d-block d-lg-none mx-auto py-20">
            <img alt="Logo" src="{{ asset('media/logos/logo-icon.png') }}" class="theme-light-show h-100px"/>
        </a>

        <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
            <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                <div class="d-flex flex-stack py-2" style="justify-content: center">
                    <img src="{{ asset('media/logos/logo-en-text.png') }}" alt="logo" width="200px">
                </div>
                <div class="py-20 login-form">

                    <form class="form w-100" novalidate="novalidate" method="POST" id="kt_sign_in_form"
                          action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" autocomplete="off"
                                   class="form-control bg-transparent"/>
                            <!--end::Email-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Password" name="password" autocomplete="off"
                                   class="form-control bg-transparent"/>
                            <!--end::Password-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <!--begin::Link-->
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Sign In</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress"> Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->
                    </form>

                </div>

                <div class="m-0">
                </div>
            </div>
        </div>

        <div
            class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat"
            style="background-image: url({{ asset('media/auth/bg11.png') }})">
        </div>
    </div>
</div>

<!--begin::Javascript-->
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
