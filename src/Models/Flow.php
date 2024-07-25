<?php

namespace Flavorly\LaravelFlows\Models;

use Flavorly\LaravelFlows\Database\Factories\FlowFactory;
use Flavorly\LaravelFlows\Listeners\FlowListener;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property array $context
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 */
#[ObservedBy(FlowListener::class)]
final class Flow extends Model
{
    /** @use HasFactory<FlowFactory> */
    use HasFactory;

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
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): FlowFactory
    {
        return FlowFactory::new();
    }
}
