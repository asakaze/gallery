<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Picture extends Model
{
    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    protected $fillable = [
        "url",
        "album_id"
    ];

    /**
     * Get parent album
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album() : BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
