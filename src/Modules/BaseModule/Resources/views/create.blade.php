@extends('components.layouts.master')
@section('page-title', 'Create '. plural_lower($moduleName))
@section('breadcrumbs', $moduleName .' - '. __('Create'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">@lang('new record')</h3>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <a href="{{ route($routePath.'.index') }}"
                               class="btn btn-secondary btn-sm font-weight-bold mr-2">
                                @lang('back')
                            </a>
                        </div>
                    </div>
                </div>
                <!--begin::Forms-->
                <form class="form" method="POST" action="{{ route($routePath.'.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        @include($viewPath.'::form')

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
