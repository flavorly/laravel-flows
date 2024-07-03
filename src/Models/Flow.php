<?php

namespace App\Services\Flows\Models;

use App\Services\Flows\Casts\FlowContextCast;
use App\Services\Flows\Enums\FlowStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @mixin IdeHelperFlow
 */
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
