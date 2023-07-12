<?php

namespace ReesMcIvor\SlotKeeper\Services;

class SlotKeeperService
{

    public function getSlotByQuery( $modelClass )
    {

        dd(get_class_methods(app($model)->slotKeepers()));

    }

}
