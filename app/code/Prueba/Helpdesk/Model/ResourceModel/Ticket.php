<?php

namespace Prueba\Helpdesk\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Ticket extends AbstractDb
{
    /**
    * Initialize resource model
    * Get table name from config
    *
    * @return void
    */
    protected function _construct()
    {
        $this->_init('bicicletasmilan_helpdesk_ticket', 'ticket_id');
    }
}
