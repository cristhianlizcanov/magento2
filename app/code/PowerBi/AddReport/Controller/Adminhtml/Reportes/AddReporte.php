<?php
namespace PowerBi\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class AddReporte extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param \PowerBi\AddReport\Model\Reportes $reportesFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Añadir Asesor al Link'));
        return $resultPage;
    }
}