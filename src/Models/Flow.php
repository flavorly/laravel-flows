<?php

namespace Flavorly\LaravelFlows\Models;

use Flavorly\LaravelFlows\Casts\FlowContextCast;
use Flavorly\LaravelFlows\Enums\FlowStatusEnum;
use Flavorly\LaravelFlows\Listeners\FlowListener;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property string $uuid
 * @property string $flowable_type
 * @property int $flowable_id
 * @property \Illuminate\Support\Collection|\Spatie\LaravelData\Contracts\BaseData $context
 * @property \Flavorly\LaravelFlows\Enums\FlowStatusEnum $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $flowable
 */
#[ObservedBy(FlowListener::class)]
final class Flow extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => FlowStatusEnum::class,
            'context' => FlowContextCast::class,
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
     * Discard a flow
     */
    public function discard(): Flow
    {
        $this->updateQuietly(['status' => FlowStatusEnum::discarded]);

        return $this;
    }

    /**
     * Clone the current flow and discards the current one
     */
    public function renew(): Flow
    {
        $this->discard();
        $flow = $this->replicate(['uuid']);
        $flow->status = FlowStatusEnum::active;
        $flow->save();

        return $flow;
    }
}
