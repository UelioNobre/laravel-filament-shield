<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class MoneyCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        // Transform the integer stored in the database into a float.
        // return number_format(round(floatval($value) / 100, precision: 2, mode: PHP_ROUND_HALF_UP), 2, ',', '.');
        return round(floatval($value) / 100, precision: 2);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        // Transform the float into an integer for storage.
        $floatVal = floatval($value) * 100;
        return round($floatVal, 2, PHP_ROUND_HALF_UP);
    }
}
