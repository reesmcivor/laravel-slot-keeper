<?php

namespace ReesMcIvor\SlotKeeper\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use ReesMcIvor\SlotKeeper\Models\SlotKeeper;

trait HasSlotKeeper
{
    public function slotKeepers() : MorphMany
    {
        return $this->morphMany(SlotKeeper::class);
    }
}
