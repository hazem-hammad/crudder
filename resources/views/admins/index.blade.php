@extends('Core::layouts.master')
@section('page-title', __('lang.Admins') )

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container-fluid">

                <div class="row g-6 g-xl-12">

                    <div class="col-lg-12">

                        @include('admins.search')
                        <div class="card">
                            <div class="card-header border-0 pt-6">
                                <div class="card-title">
                                    <div>
                                        <h2 class="fw-bolder"> Manage Admins </h2>
                                        <span class="text-gray-500 fs-6">
                                            Dashboard - promoters - Add promoter
                                        </span>
                                    </div>
                                </div>

                                <div class="card-toolbar gap-5">

                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        @can($permission::CREATE_ADMIN)
                                            <a class="btn btn-dark btn-sm"
                                               href="{{ route($config['routes']['create']) }}">
                                                <span class="svg-icon svg-icon-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.6" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"/>
                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"/>
                                                    </svg>
                                                </span>
                                                @lang('Export Data')
                                            </a>
                                        @endcan
                                    </div>

                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        @can($permission::CREATE_ADMIN)
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route($config['routes']['create']) }}">
                                                <span class="svg-icon svg-icon-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor"/>
                                                        <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="white"/>
                                                        <path opacity="0.5" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                @lang('Add admin')
                                            </a>
                                        @endcan
                                    </div>

                                </div>
                            </div>

                            <div class="card-body py-4">

                                <div class="py-5">
                                    <div class="dataTables_wrapper dt-bootstrap4">
                                        <div class="table-responsive">
                                            <table id="kt_datatable"
                                                   class="table align-middle border rounded table-row-dashed fs-6 g-5">
                                                <thead>
                                                <tr class="fs-6 text-gray-600">

                                                    @foreach ($datatable['table_header'] as $header)
                                                        {!! $header !!}
                                                    @endforeach

                                                </tr>
                                                </thead>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end::Card body-->
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        let data = '{!! json_encode($datatable['table_body']) !!}';
        let columns = JSON.parse(data);
        let data_url = "{{ route($config['routes']['datatable']) }}";
        let fixed_actions = true;
        let column_def_data = function (data) {
            data.name = $('#name').val()
            data.status = $('#status').val()
        }
    </script>
@endsection
