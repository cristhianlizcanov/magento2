<?php

namespace Prueba\Helpdesk\Controller\Adminhtml\Ticket;

use Prueba\Helpdesk\Controller\Adminhtml\Ticket;

class Grid extends Ticket
{
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
