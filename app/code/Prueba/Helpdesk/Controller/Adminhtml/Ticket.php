<?php

namespace Prueba\Helpdesk\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;

abstract class Ticket extends Action
{
	protected $resultPageFactory;
	protected $resultForwardFactory;
	protected $resultRedirectFactory;

	public function __construct(
		Context $context,
		PageFactory $resultPageFactory,
		ForwardFactory $resultForwardFactory
	) {
		$this->resultPageFactory = $resultPageFactory;
		$this->resultForwardFactory = $resultForwardFactory;
		$this->resultRedirectFactory = $context->getResultRedirectFactory();
		parent::__construct($context);
	}
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Prueba_Helpdesk::ticket_manage');
	}

	protected function _initAction()
	{
		$this->_view->loadLayout();
		$this->_setActiveMenu('Prueba_Helpdesk::ticket_manage')->_addBreadcrumb(__('Helpdesk'),	__('Tickets'));
		return $this;
	}
}
