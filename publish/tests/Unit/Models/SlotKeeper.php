<?php

namespace Tests\Unit\Models;

use Tests\TestCase;

class SlotKeeperTest extends TestCase
{
    /** @test */
    public function it_can_create_a_slot_keeper()
    {
        $slotKeeper = SlotKeeper::factory()->create();

        $this->assertDatabaseHas('slot_keepers', [
            'id' => $slotKeeper->id,
        ]);
    }
}
