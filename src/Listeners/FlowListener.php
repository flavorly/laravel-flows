<?php

namespace Flavorly\LaravelFlows\Listeners;

use Flavorly\LaravelFlows\Models\Flow;
use Illuminate\Support\Str;

final class FlowListener
{
    public function creating(Flow $model): void
    {
        if ($model->uuid === null) {
            $model->forceFill([
                'uuid' => Str::uuid(),
            ]);
        }
    }

    public function created(Flow $model): void {}

    public function updated(Flow $model): void {}

    public function deleted(Flow $model): void {}

    public function restored(Flow $model): void {}

    public function forceDeleted(Flow $model): void {}
}
