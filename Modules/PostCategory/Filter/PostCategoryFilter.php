<?php

namespace Modules\PostCategory\Filter;

use Modules\Admin\Filters\AbstractFilter;

/**
 * In this file, we will define the actual filter class.
 * I am only using a type filter for this example, but you have more than one filter
 * like age, demographics, price, etc.
 */
class PostCategoryFilter extends AbstractFilter
{
    protected $filters = [
        'status' => StatusFilter::class,
        'parent_id' => ParentCategoryFilter::class,
    ];
}