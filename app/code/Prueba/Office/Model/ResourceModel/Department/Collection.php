<?php

namespace Prueba\Office\Model\ResourceModel\Department;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Prueba\Office\Model\Department',
            'Prueba\Office\Model\ResourceModel\Department'
        );
    }
}