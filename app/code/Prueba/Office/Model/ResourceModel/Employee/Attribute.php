<?php

namespace Prueba\Office\Model\Employee;


class Attribute extends \Magento\Eav\Model\Entity\Attribute
{
    protected function _construct()
    {
        $this->_init('Prueba\Office\Model\ResourceModel\Employee\Attribute');
    }
}