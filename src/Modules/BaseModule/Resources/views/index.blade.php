@extends('Core::layouts.master')
@section('page-title', readableName($moduleName))
@section('page-sub-title', "Your ". readableName($moduleName) ." list here")
@section('page-actions')
@endsection

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container-fluid">

                <div class="row g-6 g-xl-9">

                    <div class="@if($displayPageStatistics) col-lg-9 @else col-lg-12 @endif">

                        <div class="card">
                            <div class="card-header border-0 pt-6">
                                <div class="card-title">
                                    @include($viewPath.'::search')
                                </div>

                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                                        @can($permissions::CREATE_BASE_MODULE)
                                            <a class="btn btn-primary btn-sm"
                                               @if($createFormType == 'popup')
                                                   data-bs-toggle="modal" data-bs-target="#create_modal"
                                               @else
                                                   href="{{ route($routePath.'.create') }}"
                                                @endif>
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
                                                @lang("Add ". readableName($moduleName))
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

                                                    @foreach ($table['header'] as $header)
                                                        {!! $header !!}
                                                    @endforeach

                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3">
                        @if($displayPageStatistics)
                            @include($viewPath. '::statistics')
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    @include($viewPath."::modals.create")

@endsection

@section('scripts')
    <script>
        let data = '{!! json_encode($table['body']) !!}';
        let columns = JSON.parse(data);
        let data_url = "{{ route($routePath.'.datatable') }}";
        let fixed_actions = true;
        let column_def_data = function (data) {
            data.name = $('#name').val()
            data.status = $('#status').val()
        }
    </script>
@endsection
