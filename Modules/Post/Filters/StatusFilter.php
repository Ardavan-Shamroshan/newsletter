<?php

namespace Modules\Post\Filters;

class StatusFilter
{
    public function filter($builder, $value) {
        return $builder->where('status', $value);
    }
}