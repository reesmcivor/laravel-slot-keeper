<?php

namespace ReesMcIvor\SlotKeeper\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ReesMcIvor\SlotKeeper\Database\Factories\SlotFactory;
use ReesMcIvor\SlotKeeper\Exceptions\InvalidSlotKeeperAttributes;
use ReesMcIvor\SlotKeeper\Traits\HasSlotKeeper;
use ReesMcIvor\SlotKeeper\Traits\SlotKeeperInterface;

class Slot extends Model
{
    use HasFactory;
    use HasSlotKeeper;

    protected $fillable = ['start', 'finish'];

    protected bool $shouldCheckSlotKeeper = true;
    protected array $slotKeeperAttributes = ['start', 'finish'];

    protected static function newFactory()
    {
        return new SlotFactory();
    }
}
