<?php

namespace Modules\Post\Filters;

class PostLabelFilter
{
    public function filter($builder, $value) {
        return $builder->where('label', $value);
    }
}