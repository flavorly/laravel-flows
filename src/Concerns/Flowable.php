<?php

namespace Flavorly\LaravelFlows\Concerns;

use App\Services\Flows\Enums\FlowStatusEnum;
use App\Services\Flows\Models\Flow;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait Flowable
{
    /**
     * Returns all the flows for the given model
     *
     * @return MorphMany<Flow>
     */
    public function flows(): MorphMany
    {
        return $this->morphMany(Flow::class, 'flowable');
    }

    /**
     * Returns the Latest flow
     *
     * @return MorphOne<Flow>
     */
    public function flow(): MorphOne
    {
        return $this
            ->morphOne(Flow::class, 'flowable')
            ->latestOfMany()
            ->where('status', FlowStatusEnum::active->value);
    }
}
