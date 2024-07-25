<?php

namespace Flavorly\LaravelFlows\Concerns;

use Flavorly\LaravelFlows\Models\Flow;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait Flowable
{
    /**
     * Returns all the flows for the given model
     *
     * @return HasMany<Flow>
     */
    public function flows(): HasMany
    {
        return $this->hasMany(Flow::class)->withTrashed();
    }

    /**
     * Returns the Latest flow
     *
     * @return BelongsTo<Flow,\Illuminate\Database\Eloquent\Model>
     */
    public function flow(): BelongsTo
    {
        return $this->belongsTo(Flow::class)->whereNull('deleted_at');
    }

    /**
     * Renews the flow for this model
     */
    public function flow_renew(): Flow
    {
        $this->flow()->delete();

        return $this->flow()->create();
    }
}
