<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
     protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    protected $fillable = [
        "name"
    ];

    /**
     * Get related pictures
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function pictures() : HasMany
    {
        return $this->hasMany(Picture::class);
    }
}
