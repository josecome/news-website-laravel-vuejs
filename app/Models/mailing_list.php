<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mailing_list extends Model
{
    use HasFactory;
    protected $table = 'mailing_list';
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
