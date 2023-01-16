<?php


namespace Modules\Admin\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


/**
 * The only reason I have taken the above class as an abstract class is that, in the future,
 * we have more than one kind of filter, so It is better to use this class as an abstract,
 * and then a different filter class can extend this class so that we do not repeat each code every time.
 */
abstract class AbstractFilter
{
    protected $request;

    protected $filters = [];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function filter(Builder $builder) {
        foreach ($this->getFilters() as $filter => $value) {
            $this->resolveFilter($filter)->filter($builder, $value);
        }
        return $builder;
    }

    /**
     * Get the filter and filter value defined in url
     * url: http://127.0.0.1:8000/admin/comment?approved=1
     */
    protected function getFilters() {
//        return array_filter($this->request->only(array_keys($this->filters)));
        return ($this->request->only(array_keys($this->filters)));
    }

    protected function resolveFilter($filter) {
        return new $this->filters[$filter];
    }
}