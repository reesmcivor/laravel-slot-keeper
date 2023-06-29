<?php

namespace ReesMcIvor\SlotKeeper\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ReesMcIvor\SlotKeeper\Database\Factories\SlotKeeperFactory;

class SlotKeeper extends Model
{
    use HasFactory;

    protected $fillable = ['query', 'released_at'];

    protected $casts = [
        'query' => 'array',
        'released_at' => 'datetime',
    ];

    protected static function newFactory()
    {
        return new SlotKeeperFactory();
    }
}
