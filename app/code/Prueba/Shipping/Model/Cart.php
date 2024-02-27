<?php

namespace Prueba\Shipping\Model;

use Closure;
use Magento\Checkout\Model\Cart as CheckoutModel;

class Cart
{
    public function beforeAddProduct(
        CheckoutModel $subject,
        $productInfo,
        $requestInfo = null
    ) {
        $requestInfo['qty'] = 5;
        return array($productInfo, $requestInfo);
    }

    public function aroundAddProduct(
        CheckoutModel $subject,
        Closure $proceed,
        $productInfo,
        $requestInfo = null

    ) {
        $requestInfo['qty'] = 4;
        $result = $proceed($productInfo, $requestInfo);
        return $result;
    }
}
