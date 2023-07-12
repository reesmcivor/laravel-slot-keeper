<?php

namespace ReesMcIvor\SlotKeeper\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use ReesMcIvor\SlotKeeper\Exceptions\InvalidSlotKeeperAttributes;
use ReesMcIvor\SlotKeeper\Exceptions\SlotAlreadyTaken;
use ReesMcIvor\SlotKeeper\Models\SlotKeeper;

trait HasSlotKeeper
{
    public function slotable()
    {
        return $this->morphTo();
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->checkSlotKeeper();
        });
    }

    public function getReleaseTime()
    {
        return $this->created_at->addSeconds($this->releastAfterSeconds);
    }

    public function shouldCheckSlotKeeper() : bool
    {
        return $this->shouldCheckSlotKeeper;
    }

    public function checkSlotKeeper()
    {
        if($this->shouldCheckSlotKeeper()) {
            $slotKeeperHash = $this->getSlotKeeperAttributesHash();
            if (SlotKeeper
                ::where('query_hashed', $slotKeeperHash)
                ->whereNull('released_at')
                ->where('slot_keeperable_type', get_class($this))->exists()
            ) {
                throw new SlotAlreadyTaken("Slot already exists");
            }
        }
    }

    public function getSlotKeeperAttributes() : array
    {
        if (!isset($this->slotKeeperAttributes)) {
            throw new InvalidSlotKeeperAttributes('No slotKeeperAttributes defined on ' . get_class($this));
        }
        return $this->slotKeeperAttributes;
    }

    public function createSlotKeeper()
    {
        $data = [
            'query' => $this->getSlotKeeperAttributes(),
            'query_hashed' => $this->getSlotKeeperAttributesHash(),
            'slot_keeperable_type' => get_class($this)
        ];

        $this->slotKeepers()->create($data);
    }

    public function slotKeepers() : MorphMany
    {
        return $this->morphMany(SlotKeeper::class, 'slot_keeperable');
    }

    public function scopeHasSlot( $query )
    {
        return $this
            ->slotKeepers()
            ->where('query_hashed', $this->getSlotKeeperAttributesHash())
            ->exists();
    }

    public function getSlotKeeperAttributesHash() : string
    {
        $keysToCheck = array_flip($this->getSlotKeeperAttributes());
        $result = array_intersect_key($this->toArray(), $keysToCheck);
        foreach ($result as $key => $value) {
            if ($value instanceof \DateTime) {
                $result[$key] = $value->format('Y-m-d H:i:s');
            }
        }
        return md5(json_encode($result));
    }

}
