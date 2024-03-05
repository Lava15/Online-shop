<?php

namespace Modules\Product\Queries;

use Modules\Product\Models\Category;
use Spatie\QueryBuilder\QueryBuilder;

class QueryCategories
{
    public function handle(array $includes = [], array $filters = [], array $sort = [], array $fields = []): QueryBuilder
    {
        return QueryBuilder::for(
            subject: Category::class
        )
            ->allowedFields($fields)
            ->defaultSort('order')
            ->allowedSorts($sort)
            ->allowedIncludes($includes)
            ->allowedFilters($filters);
    }
}
