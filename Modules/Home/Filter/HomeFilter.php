<?php

use Modules\Admin\Filters\AbstractFilter;
use Modules\Post\Filters\PostLabelFilter;

class HomeFilter extends AbstractFilter
{
    protected $filters = [
        'label' => PostLabelFilter::class,
    ];
}