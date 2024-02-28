<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type_of_activity extends Model
{
    use HasFactory;
    protected $table = 'types_of_activity';
    protected $fillable = ['activity_name', 'maximum_score', 'user_id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
