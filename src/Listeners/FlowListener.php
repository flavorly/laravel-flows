<?php

namespace Flavorly\LaravelFlows\Listeners;

use Flavorly\LaravelFlows\Models\Flow;

final class FlowListener
{
    public function creating(Flow $model): void
    {
        $model->flowable->flows()->whereNull('deleted_at')->delete();
    }

    public function created(Flow $model): void {}

    public function updated(Flow $model): void {}

    public function deleted(Flow $model): void {}

    public function restored(Flow $model): void {}

    public function forceDeleted(Flow $model): void {}
}
