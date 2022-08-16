<?php

namespace TysonLaravel\Enums\Traits;

use TysonLaravel\Enums\Exceptions\UndefinedCaseError;

trait InvokableCases
{
    /**
     * Return the enum's value or name when it's called ::STATICALLY().
     *
     * @param $name
     * @param $args
     *
     * @return string
     */
    public static function __callStatic($name, $args)
    {
        $cases = static::cases();
        foreach ($cases as $case) {
            if ($case->name === $name) {
                return $case instanceof \BackedEnum ? $case->value : $case->name;
            }
        }

        throw new UndefinedCaseError(static::class, $name);
    }

    /**
     * Return the enum's value when it's $invoked().
     *
     * @return string
     */
    public function __invoke(): string
    {
        return $this instanceof \BackedEnum ? $this->value : $this->name;
    }
}
