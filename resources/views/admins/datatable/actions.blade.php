<x-actions.edit-button
    url="{{ route($config['routes']['show'], $row->id) }}"
    class="btn btn-icon btn-secondary btn-hover-primary mr-3 mb-5"
    title="view"
    icon="fas fa-edit fs-2"
/>

@if($row->status == 'active')
    <a class="btn btn-icon btn-secondary btn-hover-primary mr-3 mb-5"
       data-action="{{ route($config['routes']['change-status'], $row->id) }}"
       onclick="updateModelStatus(this);">
        <i class="fas fs-2 fa-ban text-primary"></i>
    </a>
@else
    <a class="btn btn-icon btn-secondary btn-hover-primary mr-3 mb-5"
       data-action="{{ route($config['routes']['change-status'], $row->id) }}"
       onclick="updateModelStatus(this);">
        <i class="fa-regular fs-2 fa-circle-check"></i>
    </a>
@endif


{{--@if(getAuthAdmin()->primary_admin)--}}

{{--    <x-actions.delete-button--}}
{{--        url="{{ route($config['routes']['delete'], $row->id) }}"--}}
{{--        action="deleteAdmin(this)"--}}
{{--        :resource="$row"--}}
{{--        class="btn btn-icon btn-light-danger btn-hover-primary btn-sm mr-3"--}}
{{--        title="Delete"--}}
{{--        icon="fas fa-trash"--}}
{{--    />--}}

{{--@endif--}}
