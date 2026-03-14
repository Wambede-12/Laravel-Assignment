<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'year',
        'user_id',
    ];

    /**
     * Get the user that owns this book.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
