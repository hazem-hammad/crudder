<span style="width: 121px;">
    <div class="font-weight-bolder text-primary mb-0">
        {{ $row->updated_at ? $row->updated_at->toFormattedDateString() : '--' }}
    </div>
    <div class="text-muted">
        {{ $row->updated_at ? $row->updated_at->toTimeString() : '--' }}
    </div>
 </span>