<?php

namespace TysonLaravel\Enums\Traits;

trait Arrayable
{
    /**
     * Get an array of case values
     *
     * @return array
     */
    public static function toArray()
    {
        $cases = static::cases();

        return isset($cases[0]) && $cases[0] instanceof \BackedEnum
            ? array_column($cases, 'value')
            : array_column($cases, 'name');
    }
}
