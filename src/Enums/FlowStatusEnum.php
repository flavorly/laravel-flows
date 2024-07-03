<?php

namespace Flavorly\LaravelFlows\Enums;

use Flavorly\LaravelHelpers\Concerns\EnumConcern;

enum FlowStatusEnum: string
{
    use EnumConcern;

    case active = 'active';
    case discarded = 'discarded';
}
