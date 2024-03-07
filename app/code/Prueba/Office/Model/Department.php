<?php

namespace Prueba\Office\Model;

class Department extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Prueba\Office\Model\ResourceModel\Department');
    }
}
