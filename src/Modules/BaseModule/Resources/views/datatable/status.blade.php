@can($permissions::CHANGE_BASE_MODULE_STATUS)
    <div class="form-check form-switch form-check-custom form-check-solid me-10">
        <input class="form-check-input h-30px w-50px" onclick="updateModelStatus(this);" type="checkbox"
               @if($row->status) checked @endif value="active"
               data-action="{{ route($routePath.'.change-status', $row->id) }}"/>
    </div>
@else
        @if($row->status)
            <span class="text-success"> Active </span>
        @else
            <span class="text-danger"> In-active </span>
        @endif
@endcan
