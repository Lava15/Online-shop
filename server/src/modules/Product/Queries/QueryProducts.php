<?php

namespace Modules\Product\Queries;

use Modules\Product\Models\Product;
use Spatie\QueryBuilder\QueryBuilder;

class QueryProducts
{
    public function handle(array $includes = [], array $filters = [], array $sort = [], array $fields = [])
    {
        return QueryBuilder::for(
            subject: Product::class
        )
            ->allowedFields($fields)
            ->defaultSort('id')
            ->allowedSorts($sort)
            ->allowedIncludes($includes)
            ->allowedFilters($filters);
    }
}
