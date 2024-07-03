<?php

namespace App\Services\Flows\Enums;

use Flavorly\LaravelHelpers\Concerns\EnumConcern;

enum FlowStatusEnum: string
{
    use EnumConcern;

    case active = 'active';
    case discarded = 'discarded';
}
