<div class="modal fade" id="create_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" method="POST" action="{{ route($routePath . '.store') }}">
                @csrf
                <div class="modal-header" id="kt_modal_update_customer_header">
                    <h2 class="fw-bolder">
                        Create new {{ readableName($moduleName) }}
                        <span class="text-primary"></span>
                    </h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal"
                         aria-label="Close">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16"
                                      height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                      transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                         data-kt-scroll-wrappers="#kt_modal_update_customer_scroll" data-kt-scroll-offset="300px">

                        @include($viewPath.'::form')

                    </div>
                </div>

                <div class="modal-footer flex-center">
                    <button type="reset" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light me-3">
                        Discard
                    </button>
                    <x-actions.submit-button/>
                </div>

            </form>
        </div>
    </div>
</div>
