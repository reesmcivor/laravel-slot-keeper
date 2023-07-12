<?php

namespace Tests\SlotKeeper\Feature\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use ReesMcIvor\SlotKeeper\Models\Slot;
use ReesMcIvor\SlotKeeper\Models\SlotKeeper;
use Tests\TestCase;

class CreateSlotControllerTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_slot_can_be_created()
    {
        $slotKeeperData = [
            'model' => 'slot',
            'query' => [
                'start' => \Carbon\Carbon::parse('2023-12-25 00:08:00')->toDateTimeString(),
                'finish' => \Carbon\Carbon::parse('2023-12-25 00:09:00')->toDateTimeString()
            ]
        ];

        $this->postJson('/api/slot-keeper/create', $slotKeeperData)->assertStatus(200);
        $this->postJson('/api/slot-keeper/create', $slotKeeperData)->assertStatus(422);
        $this->assertDatabaseCount('slots', 1);
    }

}
