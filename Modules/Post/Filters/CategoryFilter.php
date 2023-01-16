<?php

namespace Modules\Post\Filters;

class CategoryFilter
{
    public function filter($builder, $value) {
        return $builder->where('category_id', $value);
    }
}