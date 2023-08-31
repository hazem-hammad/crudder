<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminMedia extends Model
{
    use HasFactory;

    protected $table = 'admin_media';

    /**
     * @var string[]
     */
    protected $fillable = [
        'file', 'size', 'readable_file', 'collection_name', 'admin_id'
    ];

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
