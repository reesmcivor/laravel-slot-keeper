<?php

namespace ReesMcIvor\SlotKeeper\Console\Commands;

use Illuminate\Console\Command;
use ReesMcIvor\SlotKeeper\Models\SlotKeeper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReleaseSlotKeepers extends Command {

    protected $name = 'slot-keepers:release';
    protected $description = 'Release slot keepers';

    public function run(InputInterface $input, OutputInterface $output): int
    {
        SlotKeeper::releasable()->get()->each(function($slotKeeper) {
            if($slotKeeper->slotKeeperable->getReleaseTime()->isPast()) {
                $slotKeeper->release();
            }
        });
        return 0;
    }
}