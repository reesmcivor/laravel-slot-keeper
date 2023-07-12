<?php

namespace ReesMcIvor\SlotKeeper\Traits;

interface SlotKeeperInterface
{
    public function getSlotKeeperAttributes() : array;

    public function hasSlot(): bool;

    public function slotKeepers();
}
