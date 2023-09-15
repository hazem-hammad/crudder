@can($permissions::UPDATE_BASE_MODULE)
    <x-actions.edit-button
        url="{{ route($routePath.'.edit', $row->id) }}"
        class="btn btn-icon btn-light mr-3"
        title="Edit"
        icon="fas fa-pencil-alt"
    />
@endcan

@can($permissions::CHANGE_BASE_MODULE_STATUS)
    @if($row->status)
        <a class="btn btn-icon btn-light-danger mr-3"
           data-action="{{ route($routePath . '.change-status', $row->id) }}"
           onclick="updateModelStatus(this);" title="Suspend">
            <i class="fas fs-2 fa-ban"></i>
        </a>
    @else
        <a class="btn btn-icon btn-light-success mr-3"


           data-action="{{ route($routePath . '.change-status', $row->id) }}"
           onclick="updateModelStatus(this);" title="Activate">
            <i class="fa-regular fs-2 fa-circle-check"></i>
        </a>
    @endif
@endcan
