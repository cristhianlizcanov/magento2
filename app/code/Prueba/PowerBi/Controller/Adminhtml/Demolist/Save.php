<?php
namespace Prueba\PowerBi\Controller\Adminhtml\Demolist;

use Magento\Backend\App\Action;

class Save extends Action
{
    
    private $demoFactory;
    protected $_coreRegistry;    
    protected $resultForwardFactory;
    protected $resultPageFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Prueba\PowerBi\Model\DemoFactory $demoFactory,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->demoFactory = $demoFactory;
        parent::__construct($context);
        $this->resultForwardFactory = $resultForwardFactory;
        $this->resultPageFactory = $resultPageFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Prueba_PowerBi::demolist');
    }
    
    public function execute()
    {
        
        $id = $this->getRequest()->getParam('entity_id');
        $resultRedirect = $this->resultRedirectFactory->create();

        try {
            if ($id !== null) {
                $demoData = $this->demoFactory->create()->load((int)$id);
            } else {
                $demoData = $this->demoFactory->create();
            }
            
            
            $data = $this->getRequest()->getParams();                    
            $demoData->setData($data)->save();

            $this->messageManager->addSuccess(__('Saved DemoList item.'));            
            $resultRedirect->setPath('sample/demolist');

        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
            $this->_getSession()->setDemoData($data);

            $resultRedirect->setPath('sample/demolist/edit', ['entity_id' => $id]);
        }

        return $resultRedirect;
    }
} 