<?php

namespace Milan\Listig\Controller\Adminhtml\Index;


class Test extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    /**
     * Contructor
     *
     * @param \Magento\Backend\App\Action\Context $contex
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory;
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory

    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);

    }

    /**
     * Index action
     * 
     * @return \Magento\Framework\Controller\ResourceInterface
     */

     public function execute()
     {
       $resultPage = $this->resultPageFactory->create();
       $resultPage->getConfig()->getTitle()->prepend(__(["Test Listing"]));
       return $resultPage;
     }

     protected function _isAllowed() 
     {
        return $this->_authorization->isAllowed("Milan_Listing::milan_listing_test_index");
     }

}