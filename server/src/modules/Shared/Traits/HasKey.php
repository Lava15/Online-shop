<?php

namespace Modules\Shared\Traits;

use Illuminate\Support\Str;

trait HasKey
{
    protected static function bootHasKey()
    {
        static::creating(function ($model) {
            if (empty($model->key)) {
                do {
                    $key = Str::uuid()->toString();
                } while ($model->where('key', $key)->exists());
                $model->key = $key;
            }
        });
    }
}
