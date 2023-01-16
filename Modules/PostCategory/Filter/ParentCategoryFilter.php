<?php

namespace Modules\PostCategory\Filter;

class ParentCategoryFilter
{
    public function filter($builder, $value) {
        return $value == 1 ? $builder->whereNotNull('parent_id') : $builder->whereNull('parent_id');
    }
}