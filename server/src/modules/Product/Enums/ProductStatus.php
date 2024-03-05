<?php

namespace Modules\Product\Enums;

enum ProductStatus: string
{
    case IN_STOCK = 'in_stock';
    case OUT_STOCK = 'out_stock';
    case DISCOUNT = 'discount';
    case RESERVED = 'reserved';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
