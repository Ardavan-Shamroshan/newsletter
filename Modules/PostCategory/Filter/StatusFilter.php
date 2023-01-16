<?php

namespace Modules\PostCategory\Filter;

class StatusFilter
{
    public function filter($builder, $value) {
        return $builder->where('status', $value);
    }
}