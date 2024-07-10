<?php

namespace Flavorly\LaravelFlows\Concerns;

use Flavorly\LaravelFlows\Models\Flow;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait Flowable
{
    /**
     * Returns all the flows for the given model
     *
     * @return MorphMany<Flow>
     */
    public function flows(): MorphMany
    {
        return $this->morphMany(Flow::class, 'flowable')->withTrashed();
    }

    /**
     * Returns the Latest flow
     *
     * @return MorphOne<Flow>
     */
    public function flow(): MorphOne
    {
        return $this->morphOne(Flow::class, 'flowable')->whereNull('deleted_at');
    }
}
