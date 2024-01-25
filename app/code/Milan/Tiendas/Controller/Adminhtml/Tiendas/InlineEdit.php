<?php

namespace Milan\Tiendas\Controller\Adminhtml\Tiendas;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Milan\Tiendas\Model\TiendasFactory;

class InlineEdit extends \Magento\Backend\App\Action
{
    protected $jsonFactory;
    private $tiendasFactory;
    
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        TiendasFactory $tiendasFactory) 
        {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->tiendasFactory = $tiendasFactory;        
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
                $model = $this->tiendasFactory->create()->load($modelid);
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
