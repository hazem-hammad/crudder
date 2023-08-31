<span>
    <div class="font-weight-bolder text-primary mb-0">
        {{ $row->created_at ? $row->created_at->toFormattedDateString() : '--' }}
    </div>
    <div class="text-muted">
        {{ $row->created_at ? $row->created_at->toTimeString() : '--' }}
    </div>
 </span>


