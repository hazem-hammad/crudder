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
        <!--begin::Seasons Management row-->
        <tr>
            <!--begin::Label-->
            <td class="text-gray-800">Seasons Management</td>
            <!--end::Label-->
            <!--begin::Options-->
            <td>
                <!--begin::Wrapper-->
                <div class="d-flex">
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::VIEW_SEASONS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::VIEW_SEASONS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> List </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::CREATE_SEASON }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::CREATE_SEASON) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Create </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::UPDATE_SEASON }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::UPDATE_SEASON) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Update </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::CHANGE_SEASON_STATUS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::CHANGE_SEASON_STATUS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Change status </span>
                    </label>
                    <!--end::Checkbox-->
                </div>
                <!--end::Wrapper-->
            </td>
            <!--end::Options-->
        </tr>
        <!--end::Seasons Management row-->

        <!--begin::Ticket Management row-->
        <tr>
            <!--begin::Label-->
            <td class="text-gray-800">Ticket Management</td>
            <!--end::Label-->
            <!--begin::Options-->
            <td>
                <!--begin::Wrapper-->
                <div class="d-flex">
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::VIEW_TICKETS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::VIEW_TICKETS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> List </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::CREATE_TICKET }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::CREATE_TICKET) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Create </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::UPDATE_TICKET }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::UPDATE_TICKET) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Update </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::SHOW_TICKET }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::SHOW_TICKET) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Show </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::REPLY_TICKET }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::REPLY_TICKET) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Reply </span>
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::UPDATE_TICKET_REPLIES }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::UPDATE_TICKET_REPLIES) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Update Reply </span>
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::CHANGE_TICKET_STATUS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::CHANGE_TICKET_STATUS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Change Ticket Status </span>
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::ASSIGN_TICKET }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::ASSIGN_TICKET) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Assign Ticket </span>
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::SHOW_ALL_TICKETS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::SHOW_ALL_TICKETS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> @lang('lang.Show-all-',['section' => trans('lang.Tickets')]) </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::ADD_TICKET_NOTES }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::ADD_TICKET_NOTES) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> @lang('lang.Create-',['section' => trans('lang.Note')]) </span>
                    </label>
                    <!--end::Checkbox-->
                </div>
                <!--end::Wrapper-->
            </td>
            <!--end::Options-->
        </tr>
        <!--end::Ticket Management row-->

        <!--begin::Admins Management row-->
        <tr>
            <!--begin::Label-->
            <td class="text-gray-800">Admins Management</td>
            <!--end::Label-->
            <!--begin::Options-->
            <td>
                <!--begin::Wrapper-->
                <div class="d-flex">
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::VIEW_ADMINS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::VIEW_ADMINS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> List </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::CREATE_ADMIN }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::CREATE_ADMIN) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Create </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::UPDATE_ADMIN }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::UPDATE_ADMIN) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Update </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::CHANGE_ADMIN_STATUS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::CHANGE_ADMIN_STATUS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Change status </span>
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::CHANGE_ADMIN_PROFILE_IMAGE }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::CHANGE_ADMIN_PROFILE_IMAGE) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Change profile image </span>
                    </label>
                    <!--end::Checkbox-->
                </div>
                <!--end::Wrapper-->
            </td>
            <!--end::Options-->
        </tr>
        <!--end::Admins Management row-->

        <!--begin::Reports Management row-->
        <tr>
            <!--begin::Label-->
            <td class="text-gray-800">Reports Management</td>
            <!--end::Label-->
            <!--begin::Options-->
            <td>
                <!--begin::Wrapper-->
                <div class="d-flex">
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::VIEW_REPORTS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::VIEW_REPORTS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> List </span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Checkbox-->
                    <label
                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                        <input class="form-check-input" type="checkbox"
                               value="{{ $permissionsEnum::EXPORT_TICKETS }}"
                               {{optional($row)->hasPermissionTo($permissionsEnum::EXPORT_TICKETS) ? 'checked' : '' }}
                               name="permissions[]">
                        <span class="form-check-label"> Export </span>
                    </label>
                    <!--end::Checkbox-->
                </div>
                <!--end::Wrapper-->
            </td>
            <!--end::Options-->
        </tr>
        <!--end::Reports Management row-->

    </table>
    <!--end::Table-->
</div>
<!--end::Table wrapper-->
