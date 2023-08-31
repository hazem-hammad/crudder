@extends('components.layouts.master')
@section('page-title', $moduleName)
@section('page-sub-title', "Your $moduleName list here")
@section('page-actions')
@endsection

@section('content')

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                @include($viewPath.'::search')
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                @if($createFormType == 'popup')
                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                       data-bs-target="#create_modal">

                    @else
                    <a class="btn btn-primary btn-sm" href="{{ route($routePath.'.create') }}">
                @endif
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                      transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                      fill="currentColor"></rect>
                            </svg>
                        </span>
                        @lang("Add ". singular_lower($moduleName))
                    </a>
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

    @include($viewPath."::modals.create")

@endsection

@section('scripts')
    <script>
        let data = '{!! json_encode($table['body']) !!}';
        let columns = JSON.parse(data);
        let data_url = "{{ route($routePath.'.datatable') }}";
        let fixed_actions = true;
        let column_def_data = function (d) {
            d.name = $('#name').val()
            d.status = $('#status').val()
        }
    </script>
@endsection
