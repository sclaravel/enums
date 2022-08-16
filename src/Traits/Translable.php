<?php

namespace TysonLaravel\Enums\Traits;

use Illuminate\Support\Str;

trait Translable
{
    /**
     * Translate name
     * Use file lang name is: enum.php
     *
     * @return string
     */
    public function label(): string
    {
        return trans('enum.' . Str::snake(class_basename(get_class())) . '.' . $this->name);
    }
}
