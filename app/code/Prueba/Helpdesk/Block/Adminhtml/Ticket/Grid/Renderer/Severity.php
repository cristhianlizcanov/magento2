<?php

namespace Prueba\Helpdesk\Block\Adminhtml\Ticket\Grid\Renderer;

use Magento\Framework\DataObject;
use Magento\Backend\Block\Context;
use Prueba\Helpdesk\Model\TicketFactory;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;

class Severity extends AbstractRenderer
{
	protected $ticketFactory;

	public function __construct(
		Context $context,
		TicketFactory $ticketFactory,
		array $data = []
	) {
		parent::__construct($context, $data);
		$this->ticketFactory = $ticketFactory;
	}

	public function render(DataObject $row)
	{
		$ticket = $this->ticketFactory->create()->load($row->getId());
		if ($ticket && $ticket->getId()) {
			return $ticket->getSeverityAsLabel();
		}

		return '';
	}
}
