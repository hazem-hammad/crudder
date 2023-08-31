@extends('components.layouts.master')
@section('page-title', $config['page_title'])
@section('breadcrumbs', $config['page_title'] .' - '. __('Create'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">@lang('new record')</h3>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <a href="{{ route($config['routes']['index']) }}"
                               class="btn btn-transparent-primary font-weight-bold mr-2">
                                <i class="flaticon-logout"></i>
                                @lang('back')
                            </a>
                        </div>
                    </div>
                </div>
                <!--begin::Forms-->
                <form class="form" method="POST" action="{{ route($config['routes']['store']) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row mb-12">
                            <div class="form-group col-lg-6 mb-lg-0 mb-6">
                                <label class="form-control-label">@lang('Name')</label>

                                <input type="text" class="form-control" name="name" placeholder="@lang('Name')"/>

                                <div class="invalid-feedback" id="nameMessage"></div>
                            </div>
                            <div class="form-group col-lg-6 mb-lg-0 mb-6">
                                <label class="form-control-label">@lang('Email')</label>

                                <input type="text" class="form-control" name="email" placeholder="@lang('Email')"/>

                                <div class="invalid-feedback" id="emailMessage"></div>
                            </div>
                        </div>

                        <div class="row mb-12">

                            <div class="form-group col-lg-6 mb-lg-0 mb-6">
                                <label class="form-control-label">@lang('Password')</label>

                                <input type="password" class="form-control" name="password"
                                       placeholder="@lang('Password')"/>

                                <div class="invalid-feedback" id="passwordMessage"></div>
                            </div>
                        </div>

                        <div class="row mb-12">

                            <div class="form-group col-lg-6 mb-lg-0 mb-6">
                                <label class="form-control-label">@lang('image')</label>

                                <input type="file" class="form-control" name="profile_image"/>

                                <div class="invalid-feedback" id="profile_imageMessage"></div>
                                <br>

                            </div>
                        </div>


                        <div class="row mb-12">
                            <div class="form-group col-lg-6 mb-lg-0 mb-6">
                                <label class="form-control-label">@lang('Admin type')</label>

                                <select name="primary_admin" id="primary_admin" class="form-control"
                                        style="width: 100%">
                                    <option value=""></option>
                                    <option value="0">System User</option>
                                    <option value="1">Primary Admin</option>
                                </select>
                                <div class="invalid-feedback" id="primary_adminMessage"></div>
                            </div>

                            <div class="form-group col-lg-6 mb-lg-0 mb-6" id="roles_list" style="display: none">
                                <label class="form-control-label">@lang('Select role')</label>

                                <select name="role_id" class="form-control">
                                    <option value="" selected disabled> @lang('Select role') </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="role_idMessage"></div>
                            </div>

                        </div>

                        <!--begin::Separator-->
                        <div class="separator mb-6"></div>

                        <div class="d-flex justify-content-end">
                            <x-actions.submit-button/>
                        </div>

                    </div>


                </form>
                <!--end::Forms-->
            </div>
            <!--end::Card-->
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('#primary_admin').change(function () {
                value = $(this).val()

                if (value == 0) {
                    $('#roles_list').show()
                }
                if (value == 1) {
                    $('#roles_list').hide()
                }
                if (value == 2) {
                    $('#roles_list').hide()
                }
            })
        })
    </script>

@endsection
