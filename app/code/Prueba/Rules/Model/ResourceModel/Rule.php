<?php

namespace Prueba\Rules\Model\ResourceModel;

use Magento\Rule\Model\ResourceModel\AbstractResource;

class Rule extends AbstractResource
{

    /**
     * Initialize main table and table id field
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('bicicletasmilan_rules', 'rule_id');
    }
}
