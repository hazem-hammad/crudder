{{--    @can($permission::CHANGE_ADMIN_STATUS)--}}
{{--    <input class="form-check-input h-30px w-50px" onclick="updateModelStatus(this);" type="checkbox"--}}
{{--           @if($row->status == 'active') checked @endif value="active"--}}
{{--           id="flexSwitch30x50" data-route="{{ route($config['routes']['change-status'], $row->id) }}"/>--}}
{{--    @endcan--}}

@if($row->status == 'active')
    <span class="text text-dark">
        @lang('lang.Active')
    </span>
@else
    <span class="text text-danger font-bold">
        @lang('Suspended')
    </span>
@endif


