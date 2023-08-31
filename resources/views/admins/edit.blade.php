<div class="modal fade" id="edit_admin_modal_{{ $row->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Forms-->
            <form class="form" method="POST" action="{{ route($config['routes']['update'], $row->id) }}">
                @csrf
                @method('PATCH')
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_update_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">
                        Update
                        <span class="text-primary"> {{ $row->name }} </span>
                    </h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_update_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
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
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                         data-kt-scroll-wrappers="#kt_modal_update_customer_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Notice-->
                        <!--begin::Notice-->
                        <div
                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                     height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20"
                                          height="20" rx="10" fill="black"/>
                                    <rect x="11" y="14" width="7" height="2" rx="1"
                                          transform="rotate(-90 11 14)" fill="black"/>
                                    <rect x="11" y="17" width="2" height="2" rx="1"
                                          transform="rotate(-90 11 17)" fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-bold">
                                    <div class="fs-6 text-gray-700">
                                        You have to notify your employee about updated data
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                        <!--end::Notice-->
                        <!--begin::User form-->
                        <div class="collapse show">
                            <!--begin::Input group-->
                            <div class="mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span>Update Avatar</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                       title="Allowed file types: png, jpg, jpeg."></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Image input wrapper-->
                                @can($permission::CHANGE_ADMIN_PROFILE_IMAGE)
                                    <div class="mt-1">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                             style="background-image: url({{ $row->getMedia('profile_image') }})">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                 style="background-image: url({{ $row->getMedia('profile_image') }})"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Edit-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="profile_image" accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="avatar_remove"/>
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Edit-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                    </div>
                                @endcan

                                <!--end::Image input wrapper-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="name"
                                       value="{{ $row->name }}"/>
                                <!--end::Input-->
                                <div class="invalid-feedback" id="nameMessage"></div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" class="form-control form-control-solid" name="email"
                                       value="{{ $row->email }}"/>
                                <!--end::Input-->
                                <div class="invalid-feedback" id="emailMessage"></div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Password</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="password" class="form-control form-control-solid" name="password"
                                       value=""/>
                                <!--end::Input-->
                                <div class="invalid-feedback" id="passwordMessage"></div>
                            </div>
                            <!--end::Input group-->
                            @if(getAuthAdmin()->primary_admin)

                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="form-control-label">@lang('lang.Admin type')</label>

                                    <select name="primary_admin" id="primary_admin" class="form-control"
                                            style="width: 100%">
                                        <option value=""></option>
                                        <option
                                            value="0" {{ $row->primary_admin == 0 ? 'selected' : '' }}> System User
                                        </option>
                                        <option
                                            value="1" {{ $row->primary_admin == 1 ? 'selected' : '' }}>Primary Admin
                                        </option>

                                    </select>
                                    <div class="invalid-feedback" id="primary_adminMessage"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7" id="roles_list" @if($row->primary_admin) style="display: none" @endif>

                                    <label class="form-control-label">
                                        @lang('lang.roles')
                                    </label>

                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="" disabled>Choose Role</option>
                                        @foreach ($roles as $role)
                                            <option
                                                value="{{ $role->id }}" {{ optional($row->roles->first())->id == $role->id ? 'selected' : ''}}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback" id="role_idMessage"></div>
                                </div>
                                <!--end::Input group-->
                            @endif
                        </div>
                        <!--end::User form-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-light me-3">Discard
                    </button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <x-actions.submit-button/>

                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Forms-->
        </div>
    </div>
</div>
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
