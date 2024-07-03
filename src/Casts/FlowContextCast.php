<?php

namespace Flavorly\LaravelFlows\Casts;

use Flavorly\LaravelFlows\Facades\FlowContext;
use Flavorly\LaravelFlows\Models\Flow;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

/**
 * @implements CastsAttributes<mixed,string>
 */
final class FlowContextCast implements CastsAttributes
{
    /**
     * This is important so the user can save as a collection but if instantly called again it will be the actual object
     */
    public bool $withoutObjectCaching = true;

    /**
     * Cast the given value.
     *
     * @param  array<string, string>  $attributes
     * @return Collection<string,never>|Data
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): Collection|Data
    {
        if (! $model instanceof Flow) {
            return $value;
        }

        $contextClass = FlowContext::resolve($model->flowable_type);

        if ($value instanceof $contextClass) {
            // @phpstan-ignore-next-line
            return $value;
        }

        $decodedValue = json_decode($value, true);

        if ($contextClass && is_subclass_of($contextClass, Data::class)) {
            if (empty($decodedValue)) {
                return $contextClass::from([]);
            }

            if (method_exists($contextClass, 'fromFlowRaw')) {
                return $contextClass::fromFlowRaw($decodedValue);
            }

            return $contextClass::from($decodedValue);
        }

        /** @var Collection<string,never> $collect */
        $collect = collect($decodedValue);

        return $collect;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, string>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        if (! $model instanceof Flow) {
            return $value;
        }

        $return = json_encode($value);
        if ($return === false) {
            return $value;
        }

        return $return;
    }
}
