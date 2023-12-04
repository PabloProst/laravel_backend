<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RoomUser extends Model
{
    use HasFactory;
    protected $table = 'room_user';

    protected $fillable = [
        'user_id',
        'room_id',
    ];

    public function userMembers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function roomMembers(): BelongsTo
    {
        return $this->belongsTo(Rooms::class);
    }
}
