<?php

namespace Prueba\Rules\Block\Adminhtml\Example;

use Magento\Backend\Block\Widget\Grid\Container;

class Rule extends Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'example_rule';
        $this->_headerText = __('Example Rules');
        $this->_addButtonLabel = __('Add New Rule');
        parent::_construct();
    }
}
