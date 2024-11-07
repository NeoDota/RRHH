<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Superior extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function personal() : BelongsTo {
        return $this->belongsTo(Personal::class);
    }
}
