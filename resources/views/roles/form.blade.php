<!--begin::Table wrapper-->
<div class="table-responsive">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5">
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-bold">
        <!--begin::Table row-->
{{--        <tr>--}}
{{--            <td class="text-gray-800">Administrator Access--}}
{{--                <i class="fas fa-exclamation-circle ms-1 fs-7"--}}
{{--                   data-bs-toggle="tooltip" title=""--}}
{{--                   data-bs-original-title="Allows a full access to the system"--}}
{{--                   aria-label="Allows a full access to the system"></i></td>--}}
{{--            <td>--}}
{{--                <!--begin::Checkbox-->--}}
{{--                <label--}}
{{--                    class="form-check form-check-custom form-check-solid me-9">--}}
{{--                    <input class="form-check-input" type="checkbox" value=""--}}
{{--                           id="kt_roles_select_all">--}}
{{--                    <span class="form-check-label"--}}
{{--                          for="kt_roles_select_all">Select all</span>--}}
{{--                </label>--}}
{{--                <!--end::Checkbox-->--}}
{{--            </td>--}}
{{--        </tr>--}}
        <!--end::Table row-->

        <!--begin::Admins Management row-->
        <tr>
            <!--begin::Label-->
            <td class="text-gray-800">Base Module Management</td>
            <!--end::Label-->
            <!--begin::Options-->
            <td>
                <!--begin::Wrapper-->
                <div class="d-flex">
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::LIST_BASE_MODULES }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::LIST_BASE_MODULES) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> List </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::CREATE_BASE_MODULE }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::CREATE_BASE_MODULE) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Create </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::UPDATE_BASE_MODULE }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::UPDATE_BASE_MODULE) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Update </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::CHANGE_BASE_MODULE_STATUS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::CHANGE_BASE_MODULE_STATUS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Change status </span>
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::DELETE_BASE_MODULE }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::DELETE_BASE_MODULE) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Delete </span>
                    </label>
                    <!--end::Checkbox-->

                </div>
                <!--end::Wrapper-->
            </td>
            <!--end::Options-->
        </tr>
        <!--end::Admins Management row-->

    </table>
    <!--end::Table-->
</div>
<!--end::Table wrapper-->
