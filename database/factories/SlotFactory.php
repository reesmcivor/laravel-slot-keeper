<?php

namespace ReesMcIvor\SlotKeeper\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ReesMcIvor\SlotKeeper\Models\Slot;
use ReesMcIvor\SlotKeeper\Models\SlotKeeper;

class SlotFactory extends Factory
{
    protected $model = Slot::class;

    public function definition() : array
    {
        return [
            'id' => $this->faker->randomNumber(),
            'start' => $this->faker->dateTime,
            'finish' => $this->faker->dateTime,
        ];
    }
}
