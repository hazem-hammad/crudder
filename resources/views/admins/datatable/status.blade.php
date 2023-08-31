
<div class="form-check form-switch form-check-custom form-check-solid me-10">
    @can($permission::CHANGE_ADMIN_STATUS)
    <input class="form-check-input h-30px w-50px" onclick="updateModelStatus(this);" type="checkbox"
           @if($row->status == 'active') checked @endif value="active"
           id="flexSwitch30x50" data-route="{{ route($config['routes']['change-status'], $row->id) }}"/>
    @endcan
    <label class="form-check-label" for="flexSwitch30x50">

        @if($row->status == 'active')
            <span class="badge badge-light-success">
                @lang('lang.Active')
            </span>
        @else
            <span class="badge badge-light-danger">
                @lang('lang.Inactive')
            </span>
        @endif

    </label>
</div>

