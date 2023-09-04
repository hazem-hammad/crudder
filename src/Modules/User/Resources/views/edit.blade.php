@extends('components.layouts.master')
@section('page-title', 'Update '. plural_lower($moduleName))
@section('breadcrumbs', $moduleName .' - '. __('Update'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">@lang('Update '. singular_lower($moduleName))</h3>
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
                <form class="form" method="POST" action="{{ route($routePath.'.update', $row->id) }}">
                    @method('PATCH')
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
