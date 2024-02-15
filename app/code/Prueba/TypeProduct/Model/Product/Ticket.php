<?php

namespace Prueba\TypeProduct\Model\Product;

abstract class Ticket extends \Magento\Catalog\Model\Product\Type\AbstractType
{
    const TYPE_ID = 'ticket';

    public function save($product)
    {
        parent::save($product);

        return $this;

    }

    public function deleteTypeSpeceficData(\Magento\Catalog\Model\Product $product)
    {
        return $this;

    }
}