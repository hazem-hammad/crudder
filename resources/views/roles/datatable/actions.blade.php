
<a href="{{ route($config['routes']['show'], $row->id) }}"
   class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3" title="@lang('lang.view')">
    <i class="fas fa-eye"></i>
</a>


<a href="#" onclick="deleteRole(this)" data-id="{{$row->id}}" data-action="{{ route($config['routes']['delete'], $row->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3"
   title="View">
    <i class="fas fa-trash"></i>
</a>
