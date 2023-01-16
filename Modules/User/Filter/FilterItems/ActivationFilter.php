<?php

namespace Modules\User\Filter\FilterItems;

class ActivationFilter
{
    public function filter($builder, $value) {
        return $builder->where('activation', $value);
    }
}