<?php

namespace ReesMcIvor\SlotKeeper\Models;

use Illuminate\Database\Eloquent\Model;
use ReesMcIvor\SlotKeeper\Traits\HasSlotKeeper;

class Slot extends Model
{
    use HasSlotKeeper;

    protected $guarded = ['id'];

    public function slotable()
    {
        return $this->morphTo();
    }
}
