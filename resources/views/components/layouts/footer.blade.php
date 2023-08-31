<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">{{ date('Y') }}&copy;</span>
            <a href="{{ env('APP_URL') }}" target="_blank" class="text-gray-800 text-hover-primary">
                {{ env('APP_NAME') }}
            </a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="" target="_blank" class="menu-link px-2">About</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
