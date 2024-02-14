<?php

namespace Prueba\Backend\Plugin\Catalog;

use Magento\Catalog\Modal\Product;

class ProductAround

{
    public function aroundGetName($interceptedInput)
    {
        echo __("New Name Product");
    }

    // public function beforeGetName(Product $product)
    // {
    //     var_dump($product->getSku());
    //     exit;
    //     return "";
    // }

}
