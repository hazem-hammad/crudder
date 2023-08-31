<x-actions.edit-button
    url="{{ route($config['routes']['show'], $row->id) }}"
    class="btn btn-icon btn-light-primary btn-hover-primary btn-sm mr-3"
    title="view"
    icon="fas fa-eye"
/>

{{--@can($config['permissions']['update'])--}}
{{--    <a class="btn btn-icon btn-light-primary btn-hover-primary btn-sm mr-3" data-bs-toggle="modal"--}}
{{--       data-bs-target="#edit_admin_modal_{{ $row->id }}">--}}
{{--        <i class="fas fa-pencil-alt"></i>--}}
{{--    </a>--}}

{{--    @include('admins.edit')--}}
{{--@endcan--}}

@if(getAuthAdmin()->primary_admin)

    <x-actions.delete-button
        url="{{ route($config['routes']['delete'], $row->id) }}"
        action="deleteAdmin(this)"
        :resource="$row"
        class="btn btn-icon btn-light-danger btn-hover-primary btn-sm mr-3"
        title="Delete"
        icon="fas fa-trash"
    />

@endif
