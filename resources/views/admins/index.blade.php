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
                                            Dashboard > promoters > Add promoter
                                        </span>
                                    </div>
                                </div>

                                <div class="card-toolbar gap-5">

                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        @can($permission::CREATE_ADMIN)
                                            <a class="btn btn-dark btn-sm"
                                               href="{{ route($config['routes']['create']) }}">
                                                @lang('Export Data')
                                            </a>
                                        @endcan
                                    </div>

                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        @can($permission::CREATE_ADMIN)
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route($config['routes']['create']) }}">
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
