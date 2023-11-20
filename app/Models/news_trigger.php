<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News_trigger extends Model
{
    use HasFactory;
    protected $table = 'news_trigger';
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
