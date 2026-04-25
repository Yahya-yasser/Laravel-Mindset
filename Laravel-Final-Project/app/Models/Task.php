<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;  // 1 to 1 : 1 user --> many tasks , 1 task --> 1 user (belongsTo) 

class Task extends Model // (table) task  
{
    protected $fillable = [ // fillable :  (columns that can be filled) 
        'user_id',
        'title',
        'description',
        'status',
        'priority',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); // kol task tab3a le user wahed
    }
}
