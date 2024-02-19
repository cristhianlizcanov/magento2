<?php

namespace Prueba\Helpdesk\Block\Ticket;

use Magento\Customer\Model\Session;
use Magento\Framework\Stdlib\DateTime;
use Magento\Framework\View\Element\Template;
use Prueba\Helpdesk\Model\TicketFactory;
use Magento\Framework\View\Element\Template\Context;

class Index extends Template
{
    /**
    * @var \Magento\Framework\Stdlib\DateTime
    */
    protected $dateTime;
    /**
    * @var \Magento\Customer\Model\Session
    */
    protected $customerSession;
    /**
    * @var \Foggyline\Helpdesk\Model\TicketFactory
    */
    protected $ticketFactory;
    /**
    * @param \Magento\Framework\View\Element\Template\Context $context
    * @param array $data
    */
    public function __construct(
        Context $context,
        DateTime $dateTime,
        Session $customerSession,
        TicketFactory $ticketFactory,
        array $data = []
    )
    {
        $this->dateTime = $dateTime;
        $this->customerSession = $customerSession;
        $this->ticketFactory = $ticketFactory;
        parent::__construct($context, $data);
    }
    
    /**
    * @return \Prueba\Helpdesk\Model\ResourceModel\Ticket\Collection
    */
    public function getTickets()
    {
        return $this->ticketFactory->create()
                ->getCollection()
                ->addFieldToFilter('customer_id', $this->customerSession->getCustomerId());
    }

    public function getSeverities()
    {
        return \Prueba\Helpdesk\Model\Ticket::getSeveritiesOptionArray();
    }
}
