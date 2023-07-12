<?php

namespace ReesMcIvor\SlotKeeper\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use ReesMcIvor\SlotKeeper\Database\Factories\SlotKeeperFactory;

class SlotKeeper extends Model
{
    use HasFactory;

    protected $fillable = [
        'query',
        'query_hashed',
        'released_at',
        'slot_keeperable_type'
    ];

    protected $casts = [
        'query' => 'array',
        'released_at' => 'datetime',
    ];

    protected static function newFactory()
    {
        return new SlotKeeperFactory();
    }
}
