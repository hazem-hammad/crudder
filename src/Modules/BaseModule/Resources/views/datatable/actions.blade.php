<x-actions.edit-button
    url="{{ route($routePath.'.edit', $row->id) }}"
    class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3"
    title="Edit"
    actionType="popup"
    modalId="update_modal_{{ $row->id }}"
    icon="fas fa-pencil-alt"
/>

@if($deletionAllowed)
    <x-actions.delete-button
        url="{{ route($routePath.'.destroy', $row->id) }}"
        function="deleteModel(this)"
        :model="$row"
        class="btn btn-icon btn-light-danger btn-hover-primary btn-sm mr-3"
        title="Delete"
        icon="fas fa-trash-alt"
    />
@endif
