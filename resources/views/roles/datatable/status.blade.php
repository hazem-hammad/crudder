@if($row->status == 'active')

    <span class="label label-lg font-weight-bold label-light-success label-inline">
        @lang('lang.active')
    </span>

@else

    <span class="label label-lg font-weight-bold label-light-danger label-inline">
        @lang('lang.inactive')
    </span>

@endif
