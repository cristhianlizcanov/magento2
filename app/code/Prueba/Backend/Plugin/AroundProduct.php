<?php

namespace Prueba\Backend\Plugin;

use Magento\Catalog\Model\Product;

class AroundProduct
{
    public function aroundSave(Product $subject, callable $proceed)
    {
       $subject->setMyCustomAttribute('sample');

       $return = $proceed();

       $subject->setMyCustomAttribute('');  //New value
                                                
       return $return;
    }
}