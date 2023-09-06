@extends('Core::layouts.master')
@section('page-title', $config['page_title'])
@section('page-sub-title', $row->name)

@section('content')

    <div id="kt_content_container" class="container-fluid">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                <!--begin::Card-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body pt-15">
                        <!--begin::Summary-->
                        <div class="d-flex flex-center flex-column mb-5">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                <img src="{{ $row->getMedia('profile_image') }}" alt="image">
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">
                                {{ $row->name }}
                            </a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="fs-5 fw-bold text-muted mb-6">
                                {{ $row->primary_admin ? 'Primary admin' : $row->roles?->first()?->name }}
                            </div>
                            <!--end::Position-->
                            <!--begin::Info-->
                            @if(!getAuthAdmin()->primary_admin)
                                <div class="d-flex flex-wrap flex-center">
                                    <!--begin::Stats-->
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700">
                                            <span class="w-75px">{{$closedTicketsCount}}</span>
                                        </div>
                                        <div class="fw-bold text-muted"> Closed Tickets</div>
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <!--begin::Stats-->
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700">
                                            44
                                        </div>
                                        <div class="fw-bold text-muted">Open tickets</div>
                                    </div>
                                    <!--end::Stats-->
                                </div>
                            @endif
                            <!--end::Info-->
                        </div>
                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                 href="#kt_customer_view_details" role="button" aria-expanded="false"
                                 aria-controls="kt_customer_view_details">Details
                                <span class="ms-2 rotate-180">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                </span>
                            </div>
                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title=""
                                  data-bs-original-title="Edit employee details">
                                <a href="#" class="btn btn-sm btn-primary"
                                   data-bs-toggle="modal"
                                   data-bs-target="#edit_admin_modal_{{ $row->id }}">Edit</a>
                            </span>
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--begin::Details content-->
                        <div id="kt_customer_view_details" class="collapse show">
                            <div class="py-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Email</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">
                                        {{ $row->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end::Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade active show" id="kt_customer_view_overview_tab" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2> Statistics </h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Filter-->
                                    <!--end::Filter-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0 pb-5">
                                <div class="row">

                                    <div class="col-xl-4">
                                        <!--begin::Statistics Widget 5-->
                                        <div class="card bg-danger hoverable card-xl-stretch mb-5 mb-xl-8">
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
                                                <div
                                                    class="text-white fw-bolder fs-2 mb-2 mt-5">23 / 43
                                                </div>
                                                <div class="fw-bold text-white"> Today / Total tickets
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 5-->
                                    </div>
                                    @if(true)
                                        <div class="col-xl-4">
                                            <div class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
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
                                                    <div class="text-white mb-2 mt-5">
                                                        <span class="fw-bolder fs-2"> 54 </span>
                                                    </div>
                                                    <div class="fw-bold text-white"> Open tickets</div>
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                        </div>
                                    @endif
                                    @if(true)
                                        <div class="col-xl-4">
                                            <div class="card bg-success hoverable card-xl-stretch mb-xl-8">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
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
                                                    <div class="text-white mb-2 mt-5">
                                                        <span class="fw-bolder fs-2"> 2023-09-13 </span>
                                                    </div>
                                                    <div class="fw-bold text-white">Last assigned ticket</div>
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->

                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
        <!--begin::Modals-->
        <!--begin::Modal - New Address-->
        @include('admins.edit')
        <!--end::Modal - New Address-->
        <!--end::Modals-->
    </div>

@endsection
@section('scripts')
    <script>
    </script>
@endsection
