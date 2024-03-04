<?php

namespace Prueba\Rules\Controller\Adminhtml\Example\Rule;

use Prueba\Rules\Controller\Adminhtml\Example\Rule;

class NewAction extends Rule
{
    /**
     * New action
     * @return void
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}
