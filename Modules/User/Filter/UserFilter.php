<?php

namespace Modules\User\Filter;

use Modules\Admin\Filters\AbstractFilter;
use Modules\User\Filter\FilterItems\ActivationFilter;
use Modules\User\Filter\FilterItems\UserTypeFilter;

class UserFilter extends AbstractFilter
{
    protected $filters = [
        'user_type' => UserTypeFilter::class,
        'activation' => ActivationFilter::class,
    ];
}