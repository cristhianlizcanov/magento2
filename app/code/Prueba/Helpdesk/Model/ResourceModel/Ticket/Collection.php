<?php

namespace Prueba\Helpdesk\Model\ResourceModel\Ticket;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
    * Constructor
    * Configures collection
    *
    * @return void
    */
    protected function _construct()
    {
        $this->_init('Prueba\Helpdesk\Model\Ticket', 'Prueba\Helpdesk\Model\ResourceModel\Ticket');
    }
}
