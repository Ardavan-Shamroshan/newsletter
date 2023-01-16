<?php

namespace Modules\User\Filter\FilterItems;

class UserTypeFilter
{
    public function filter($builder, $value) {
        $value = $value == 'manager' ? $value = 1 : $value = 0;
        $builder = $builder->where('user_type', $value);
        return $builder->where('user_type', $value);
    }
}