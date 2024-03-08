<?php

namespace PowerBi\Asesor\Controller\Adminhtml\Asesores;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {        
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('PowerBi_Asesor::index_asesores');
    }
}