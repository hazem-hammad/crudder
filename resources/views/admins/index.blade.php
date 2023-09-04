@extends('components.layouts.master')
@section('page-title', __('lang.Admins') )
@section('page-sub-title', __('Manage your admins here'))
@section('page-actions')
@endsection

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container-fluid">

                <div class="row g-6 g-xl-9">

                    <div class="col-lg-9">

                        <div class="card">
                            <div class="card-header border-0 pt-6">
                                <div class="card-title">
                                    @include('admins.search')
                                </div>

                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        @can($permission::CREATE_ADMIN)
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route($config['routes']['create']) }}">
                                                <span class="svg-icon svg-icon-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                              rx="1"
                                                              transform="rotate(-90 11.364 20.364)"
                                                              fill="currentColor"></rect>
                                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                              fill="currentColor"></rect>
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

                    <div class="col-lg-3">

                        <div class="col-xl-12">
                            <!--begin::Statistics Widget 5-->
                            <div class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                  d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z"
                                                  fill="white"></path>
                                            <path
                                                d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{$activeAdminsCount}}</div>
                                    <div class="fw-bold text-white"> Active employees</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-12">
                            <div class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                  d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                  fill="black"></path>
                                            <path
                                                d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-black mb-2 mt-5">
                                        <span class="fw-bolder fs-2"> {{$assignedAdminTodayCount}} </span>
                                        <span> Employee(s) </span>
                                    </div>
                                    <div class="fw-bold text-black">Assigned to tickets today</div>
                                </div>
                                <!--end::Body-->
                            </div>
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
