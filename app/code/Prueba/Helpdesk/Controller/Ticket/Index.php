<?php

namespace Prueba\Helpdesk\Controller\Ticket;

use Prueba\Helpdesk\Controller\Ticket;
use Magento\Framework\Controller\ResultFactory;

class Index extends Ticket
{
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
