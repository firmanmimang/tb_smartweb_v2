<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user'];

    public function news():BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
