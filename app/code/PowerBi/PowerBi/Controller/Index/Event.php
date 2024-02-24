<?php 

namespace PowerBi\PowerBi\Controller\Index;

use Magento\Framework\App\Action\Action;

class Event extends Action
{
    protected $resultPageFactory;
    
    public function __construct(      
    
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ){           
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        $parameters = [
           'product' => $this->_objectManager->create('Magento\Catalog\Model\Product')->load(1),
           'category' => $this->_objectManager->create('Magento\Catalog\Model\Product')->load(2)
        ];
        

        $this->_eventManager->dispatch('backenddev_register_visit', $parameters);

        echo "Define V2";
        exit;        
        
        return $resultPage;    
        
    }
}