<?php

namespace Prueba\TypeProduct\Model\Product;

use Magento\Catalog\Model\Product\Type\Price as ProductPriceType;

class Price extends ProductPriceType
{
    public function getPrice($product)
    {
        return 0;
    }
}
