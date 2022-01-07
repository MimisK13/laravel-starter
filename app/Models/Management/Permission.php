<?php

namespace App\Models\Management;

use App\Models\Traits\FormatTimeStamps;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use FormatTimeStamps;
}
