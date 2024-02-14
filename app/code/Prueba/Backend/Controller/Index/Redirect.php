<?php
    
namespace Prueba\Backend\Controller\Index;

 use Magento\Framework\App\Action\HttpGetActionInterface;
 use Magento\Framework\Controller\Result\RedirectFactory;
 

class Redirect implements HttpGetActionInterface
{
    protected $resultRedirectFactory;
    public function __construct(RedirectFactory $resultRedirectFactory)
    {
        $this->resultRedirectFactory = $resultRedirectFactory;
    }
   
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setUrl('/backendtest');
        return $resultRedirect;
    }
}