<?php

namespace Flavorly\LaravelFlows\Database\Factories;

use Flavorly\LaravelFlows\Models\Flow;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Flow>
 */
final class FlowFactory extends Factory
{
    protected $model = Flow::class;

    /**
     * Define the model's default state.
     *
     * {@inheritdoc}
     */
    public function definition(): array
    {
        return [
            'context' => [],
        ];
    }
}
