@extends('components.layouts.master')
@section('page-title', __('lang.Roles'))
@section('page-sub-title', __('lang.Your roles list here'))
@section('breadcrumbs', __('lang.Roles'))

@section('page-actions')
@endsection

@section('content')

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Row-->
            <div class="row">

                <!--begin::Add new card-->
                <div class="col-md-3 col-sm-6 col-xs-12 mb-5">
                    <!--begin::Card-->
                    <div class="card h-md-100">
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-center">
                            <!--begin::Button-->
                            <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                    data-bs-toggle="modal" data-bs-target="#add_role_modal">
                                <!--begin::Illustration-->
                                <img src="{{ asset('media/illustrations/sketchy-1/4.png') }}" alt=""
                                     class="mw-100 mh-150px mb-7">
                                <!--end::Illustration-->
                                <!--begin::Label-->
                                <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                                <!--end::Label-->
                            </button>
                            <!--begin::Button-->
                        </div>
                        <!--begin::Card body-->
                    </div>
                    <!--begin::Card-->
                </div>
                <!--begin::Add new card-->

                @foreach($roles as $role)
                    <!--begin::Col-->
                    <div class="col-md-3 col-sm-6 col-xs-12 mb-5">
                        <!--begin::Card-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2> {{ $role->name }} </h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-1">
                                <!--begin::Users-->
                                <div class="fw-bolder text-black mb-5">
                                    <span class="text-primary"> Total users with this role: </span>
                                    <span class="font-weight-bold"> {{ $role->users_count }} user(s)</span>
                                </div>
                                <!--end::Users-->
                                <!--begin::Permissions-->
                                <div class="d-flex flex-column text-gray-600">
                                    @foreach($role->permissions->take(5) as $permission)
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>
                                            {{ $permission->name }}
                                        </div>
                                    @endforeach
                                    @if($role->permissions->count() > 5)
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>
                                            <em>and {{ $role->permissions->count() - 5 }} more...</em>
                                        </div>
                                    @endif
                                </div>
                                <!--end::Permissions-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card footer-->
                            <div class="card-footer flex-wrap pt-0">
                                <a href="{{ route($config['routes']['show'], $role->id) }}"
                                   class="btn btn-sm btn-light my-1 me-2 text-primary">
                                    View Role
                                </a>

                                <button type="button" class="btn btn-sm btn-primary btn-active-light-primary my-1"
                                        data-bs-toggle="modal" data-bs-target="#edit_modal_role_{{ $role->id }}">
                                    Edit Role
                                </button>

                                @include('roles.edit', ['row' => $role])
                            </div>
                            <!--end::Card footer-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                @endforeach

            </div>
            <!--end::Row-->
            <!--begin::Modals-->

            @include('roles.create')

            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>

@endsection

@section('scripts')


@endsection
