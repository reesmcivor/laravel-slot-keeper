<?php

namespace ReesMcIvor\SlotKeeper\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ReesMcIvor\SlotKeeper\Models\SlotKeeper;

class SlotKeeperFactory extends Factory
{
    protected $model = SlotKeeper::class;

    public function definition() : array
    {
        return [
            'id' => $this->faker->randomNumber(),
            'model' => $this->faker->randomElement(config('slot-keeper.models')),
            'query' => [
                'date' => $this->faker->date,
                'time' => $this->faker->time,
            ]
        ];
    }
}
