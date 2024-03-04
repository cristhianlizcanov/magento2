<?php
namespace Prueba\Rules\Block\Adminhtml\Example\Rule\Edit;

use Magento\Backend\Block\Widget\Tabs as TabsRule;

class Tabs extends TabsRule
{
    
    public function _construct() {
        parent::_construct();
        $this->setId('rules_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Rule'));
    }
}
