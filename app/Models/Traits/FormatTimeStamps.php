<?php

namespace App\Models\Traits;

use Carbon\Carbon;

Trait FormatTimeStamps
{
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }


    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }


    public function setDeletedAtAttribute($value)
    {
        $this->attributes['deleted_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getDeletedAtAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }
}
