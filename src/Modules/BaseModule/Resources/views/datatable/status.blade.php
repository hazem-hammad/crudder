<div class="form-check form-switch form-check-custom form-check-solid me-10">
        <input class="form-check-input h-30px w-50px" onclick="updateModelStatus(this);" type="checkbox"
               @if($row->status) checked @endif value="active"
               id="flexSwitch30x50" data-route="{{ route($routePath.'.change-status', $row->id) }}"/>
</div>

@include($viewPath.'::modals.edit')
