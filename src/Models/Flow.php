<?php

namespace Flavorly\LaravelFlows\Models;

use Flavorly\LaravelFlows\Listeners\FlowListener;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $flowable_type
 * @property int $flowable_id
 * @property array $context
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $flowable
 */
#[ObservedBy(FlowListener::class)]
final class Flow extends Model
{
    use SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'context' => 'array',
        ];
    }

    /**
     * Returns the related flowable model
     *
     * @return MorphTo<Model,Flow>
     */
    public function flowable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Renews the flow
     */
    public function renew(): void
    {
        $flowable = $this->flowable;
        $this->delete();
        $flowable->flows()->create();
    }
}
