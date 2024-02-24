<?php

namespace PowerBi\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use PowerBi\AddReport\Model\ReportesFactory;

class InlineEdit extends \Magento\Backend\App\Action
{
    protected $jsonFactory;
    private $reportesFactory;
    
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        ReportesFactory $reportesFactory) 
        {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->reportesFactory = $reportesFactory;        
    }

    public function execute()
    {
      $resultJson = $this->jsonFactory->create();
      $error = false;
      $messages = [];

      if($this->getRequest()->getParam('isAjax'))
      {
        $postItems = $this->getRequest()->getParam('items', []);
        if(!count($postItems))
        {
            $messages[] = __(['Please correct the data sent.']);
            $error = true;
        }else{
            foreach(array_keys($postItems) as $modelid)
            {
                $model = $this->reportesFactory->create()->load($modelid);
                try
                {
                    $model->setData(array_merge($model->getData(), $postItems[$modelid]));
                    $model->save();
                }
                catch(\Exception $e)
                {
                    $messages[] = "[Error : {$modelid}] {$e->getMessage()}";
                    $error = true;
                }
            }
        }
      }

      return $resultJson->setData([
        'messages' => $messages,
        'error' => $error]);
    }
}
