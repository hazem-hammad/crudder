<div class="d-flex align-items-center position-relative my-1">
    <input type="text" name="name" id="name"
           class="form-control form-control-sm datatable-input ps-14" placeholder="@lang('Search Admins')">
    &nbsp;&nbsp;
    <select class="form-select form-control-solid form-select-sm datatable-input" data-control="select2"
            data-placeholder="@lang('Select an option')" id="status" name="status">
        <option></option>
        <option value="{{\App\Enums\ActivationType::ACTIVE->getActivationStatus()}}"> @lang('Active') </option>
        <option value="{{\App\Enums\ActivationType::IN_ACTIVE->getActivationStatus()}}"> @lang('Inactive') </option>
    </select>
    &nbsp;&nbsp;

    <button class="btn btn-primary me-2 ml-5 btn-sm" id="kt_search">
        <span>
            <span> @lang('Search') </span>
        </span>
    </button>

    <button class="btn btn-light-primary btn-sm" id="kt_reset">
        <i class="fas fa-close"></i>
    </button>
</div>
