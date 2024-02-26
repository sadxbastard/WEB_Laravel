<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Type_of_activity extends Model
{
    use HasFactory;
    protected $table = 'types_of_activity';
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
