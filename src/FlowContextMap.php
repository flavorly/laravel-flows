<?php

namespace Flavorly\LaravelFlows;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

final class FlowContextMap
{
    /**
     * @var Collection<string, string>
     */
    protected Collection $registry;

    public function __construct()
    {
        $this->registry = collect();
    }

    /**
     * @param  array<string,string>  $mappings
     */
    public function register(array $mappings): void
    {
        $this->registry = $this->registry->merge($mappings);
    }

    public function resolve(string $morphType): ?string
    {
        $class = collect(Relation::$morphMap)->get($morphType) ?? collect(Relation::$morphMap)->flip()->get($morphType);

        return $this->registry->get($class);
    }

    /**
     * @return Collection<string, string>
     */
    public function registry(): Collection
    {
        return $this->registry;
    }
}
