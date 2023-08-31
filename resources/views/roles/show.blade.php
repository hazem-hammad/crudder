@extends('components.layouts.master')
@section('page-title', __('lang.Roles'))
@section('breadcrumbs', $config['page_title'] .' - '. __('lang.Show'))

@section('content')

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
                    <!--begin::Card-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="mb-0"> {{ $role->name }} </h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Permissions-->
                            <div class="d-flex flex-column text-gray-600">
                                @foreach($role->permissions as $permission)
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>
                                        {{ $permission->name }}
                                    </div>
                                @endforeach
                            </div>
                            <!--end::Permissions-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer pt-0">
                            <button type="button" class="btn btn-sm btn-primary btn-active-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edit_modal_role_{{ $role->id }}">
                                Edit Role
                            </button>

                            @include('roles.edit', ['row' => $role])
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-10">
                    <!--begin::Card-->
                    <div class="card card-flush mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header pt-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="d-flex align-items-center">Users Assigned
                                    <span class="text-gray-600 fs-6 ms-1">
                                        ({{ count($users) }})
                                    </span>
                                </h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1"
                                     data-kt-view-roles-table-toolbar="base">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                             height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                                            <rect opacity="0.5" x="17.0365" y="15.1223"--}}
{{--                                                  width="8.15546" height="2" rx="1"--}}
{{--                                                  transform="rotate(45 17.0365 15.1223)"--}}
{{--                                                  fill="black"></rect>--}}
{{--                                            <path--}}
{{--                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"--}}
{{--                                                fill="black"></path>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
                                    <!--end::Svg Icon-->
{{--                                    <input type="text" data-kt-roles-table-filter="search"--}}
{{--                                           class="form-control form-control-solid w-250px ps-15"--}}
{{--                                           placeholder="Search Users">--}}
                                </div>
                                <!--end::Search-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none"
                                     data-kt-view-roles-table-toolbar="selected">
                                    <div class="fw-bolder me-5">
                                        <span class="me-2" data-kt-view-roles-table-select="selected_count"></span>Selected
                                    </div>
                                    <button type="button" class="btn btn-danger"
                                            data-kt-view-roles-table-select="delete_selected">Delete Selected
                                    </button>
                                </div>
                                <!--end::Group actions-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div id="kt_roles_view_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table
                                        class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer"
                                        id="kt_roles_view_table">
                                        <!--begin::Table head-->
                                        <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-50px sorting" tabindex="0"
                                                aria-controls="kt_roles_view_table" rowspan="1" colspan="1"
                                                aria-label="ID: activate to sort column ascending">ID
                                            </th>
                                            <th class="min-w-150px sorting" tabindex="0"
                                                aria-controls="kt_roles_view_table" rowspan="1" colspan="1"
                                                aria-label="User: activate to sort column ascending">User
                                            </th>
                                            <th class="min-w-125px sorting" tabindex="0"
                                                aria-controls="kt_roles_view_table" rowspan="1" colspan="1"
                                                aria-label="Joined Date: activate to sort column ascending">Joined Date
                                            </th>
                                            <th class="min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Actions">Actions
                                            </th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">

                                        @foreach($users as $user)

                                            <tr>
                                                <!--begin::ID-->
                                                <td>{{ $user->id }}</td>
                                                <!--begin::ID-->
                                                <!--begin::User=-->
                                                <td class="d-flex align-items-center">
                                                    <!--begin:: Avatar -->
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <a href="{{ route('admin.admins.show', $user->id) }}">
                                                            <div class="symbol-label">
                                                                <img src="{{ $user->getMedia('image') }}"
                                                                     alt="EA"
                                                                     class="w-100">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::User details-->
                                                    <div class="d-flex flex-column">
                                                        <a href="{{ route('admin.admins.show', $user->id) }}"
                                                           class="text-primary text-hover-primary mb-1">
                                                            {{ $user->name }}
                                                        </a>
                                                        <span>
                                                            {{ $user->email }}
                                                        </span>
                                                    </div>
                                                    <!--begin::User details-->
                                                </td>
                                                <!--end::user=-->
                                                <!--begin::Joined date=-->
                                                <td data-order="2021-03-10T11:05:00+02:00">10 Mar 2021, 11:05 am</td>
                                                <!--end::Joined date=-->
                                                <!--begin::Action=-->
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                       data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="black"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <!--begin::Menu-->
                                                    <div
                                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('admin.admins.show', $user->id) }}"
                                                               class="menu-link px-3">View</a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                                <!--end::Action=-->
                                            </tr>

                                        @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Container-->
    </div>

@endsection
