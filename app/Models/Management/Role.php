<?php

namespace App\Models\Management;

use App\Models\Traits\FormatTimeStamps;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use FormatTimeStamps;
}
