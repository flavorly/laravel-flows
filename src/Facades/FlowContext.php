<?php

namespace Flavorly\LaravelFlows\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void register(array $mappings)
 * @method static string|null resolve(string $morphType)
 * @method static \Illuminate\Support\Collection registry()
 *
 * @see \Flavorly\LaravelFlows\FlowContextMap
 */
final class FlowContext extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Flavorly\LaravelFlows\FlowContextMap::class;
    }
}
