<?php

namespace Prueba\Office\Model\ResourceModel;

class Employee extends \Magento\Eav\Model\Entity\AbstractEntity
{

    protected function _construct()
    {
        $this->_read = 'bicicletasmilan_office_employee_read';
        $this->_write = 'bicicletasmilan_office_employee_write';        
    }

    /**
     * Getter and lazy loader for _type
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return \Magento\Eav\Model\Entity\Type
     */
    public function getEntityType()
    {
        if (empty($this->_type)) {            
            $this->setType(\Prueba\Office\Model\Employee::ENTITY);
        }
        return parent::getEntityType();
    }

}