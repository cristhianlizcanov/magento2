<?php

namespace Prueba\Helpdesk\Model\Ticket\Grid;

use Prueba\Helpdesk\Model\Ticket;
use Magento\Framework\Option\ArrayInterface;

class Severity implements ArrayInterface
{
	public function toOptionArray()
	{
		return Ticket::getSeveritiesOptionArray();
	}
}
