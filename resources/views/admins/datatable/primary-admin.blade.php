@if($row->primary_admin == 1)
    <span class="label label-lg font-weight-bold label-light-success label-inline">
        @lang('lang.yes')
    </span>
@else
    <span class="badge badge-light-success">
        {{ $row->roles?->first()?->name }}
    </span>
@endif
