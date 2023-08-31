@extends('components.layouts.master')
@section('page-title', $config['page_title'])
@section('breadcrumbs', $config['page_title'] .' - '. __('Show'))

@section('content')

    <div class="container">

        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                    <span class="svg-icon svg-icon-1 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                      transform="rotate(-90 11.364 20.364)" fill="currentColor"/>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"/>
                            </svg>
                        </span>
                    <!--end::Svg Icon-->
                    <h4> @lang('Update settings') </h4>
                </div>
                <!--end::Card title-->

                <div class="example-tools justify-content-center">
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Forms-->
                <form class="form" method="POST" action="{{ route($config['routes']['update']) }}">
                    @csrf
                    @method('PATCH')

                    <div class="row">


                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="form-control-label">@lang('lang.allow reply ticket')</label>
                                <div class="form-check form-switch form-check-custom form-check-solid me-10">

                                    <input class="form-check-input h-30px w-50px"
                                           type="checkbox"
                                           name="reply_ticket"
                                           @if($setting?->reply_ticket) checked @endif value="1"
                                           id="flexSwitch30x50"/>

                                </div>


                                <div class="invalid-feedback" id="reply_ticketMessage"></div>
                            </div>
                        </div>


                    </div>

                    <div class="row">


                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="form-control-label">@lang('Close Ticket After First Reply')</label>
                                <div class="form-check form-switch form-check-custom form-check-solid me-10">

                                    <input class="form-check-input h-30px w-50px"
                                           type="checkbox"
                                           name="close_ticket_after_first_reply"
                                           @if($setting?->close_ticket_after_first_reply) checked
                                           @endif value="1"
                                           id="flexSwitch30x50"/>

                                </div>


                                <div class="invalid-feedback" id="close_ticket_after_first_replyMessage"></div>
                            </div>
                        </div>


                    </div>

                    <!--begin::Separator-->
                    <div class="separator mb-6"></div>

                    <div class="d-flex justify-content-end">
                        <x-actions.submit-button/>

                    </div>

                </form>
                <!--end::Forms-->
            </div>
            <!--end::Card body-->
        </div>
    </div>

@endsection
@section('scripts')
@endsection
