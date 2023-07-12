<?php

namespace Tests\Unit\Models;

use ReesMcIvor\SlotKeeper\Exceptions\InvalidSlotKeeperAttributes;
use ReesMcIvor\SlotKeeper\Services\SlotKeeperService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ReesMcIvor\SlotKeeper\Exceptions\SlotAlreadyTaken;
use ReesMcIvor\SlotKeeper\Models\Slot;
use Tests\TestCase;

class SlotKeeperTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_slot_keeper()
    {
        $slotKeeperData = [
            'start' => \Carbon\Carbon::parse('2023-12-25 00:08:00'),
            'finish' => \Carbon\Carbon::parse('2023-12-25 00:09:00')
        ];
        Slot::factory($slotKeeperData)->create()->createSlotKeeper();
        $this->assertCount(1, Slot::all());
    }

    /** @test */
    public function only_one_request_of_the_same_query_and_model_can_be_added()
    {
        $this->expectException(\Exception::class);
        $slotKeeperData = ['query' => ['start' => now(), 'finish' => now()->addMinutes(60)]];
        Slot::factory($slotKeeperData)->create()->createSlotKeeper();
        Slot::factory($slotKeeperData)->create()->createSlotKeeper();
        $this->assertCount(1, Slot::all());
    }

}