<?php

namespace TysonLaravel\Enums;

trait Options
{
    /**
     * Get an associative array of [case name => case value].
     *
     * @return array
     */
    public static function options(): array
    {
        $cases = static::cases();
        if (in_array('App\Enums\Traits\Translable', class_uses(self::class))) {
            $result = [];

            foreach ($cases as $item) {
                $key = $item instanceof \BackedEnum ? $item->value : strtolower($item->name);

                $result[$key] = $item->label();
            }

            return $result;
        }

        return isset($cases[0]) && $cases[0] instanceof \BackedEnum
            ? array_column($cases, 'name', 'value')
            : array_column($cases, 'name');
    }
}
