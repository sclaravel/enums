<?php

namespace TysonLaravel\Enums\Exceptions;

use Error;
use JetBrains\PhpStorm\Pure;

class UndefinedCaseError extends Error
{
    /**
     * Construct the error object.
     *
     * @link https://php.net/manual/en/error.construct.php
     *
     * @param string $enum
     * @param string $case
     */
    #[Pure]
    public function __construct(string $enum, string $case)
    {
        // Matches the error message of invalid Foo::BAR access
        parent::__construct("Undefined constant $enum::$case");
    }
}
