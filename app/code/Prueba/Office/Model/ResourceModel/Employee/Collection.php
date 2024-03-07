<?php

namespace Prueba\Office\Model\ResourceModel\Employee;

class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection    
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Prueba\Office\Model\Employee', 'Prueba\Office\Model\ResourceModel\Employee');
    }
}