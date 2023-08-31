<?php

namespace App\Models\Setting;

use App\Foundation\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends BaseModel
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['reply_ticket', 'close_ticket_after_first_reply'];

}
