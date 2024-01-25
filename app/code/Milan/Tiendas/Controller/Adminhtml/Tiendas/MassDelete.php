<?php

namespace Milan\Tiendas\Controller\Adminhtml\Tiendas;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Milan\Tiendas\Model\ResourceModel\Tiendas\CollectionFactory;

class MassDelete extends Action
{
    public $collectionFactory;
    public $filter;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ){
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try{
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $count = 0;
            foreach($collection as $model){
                $deleteItem = $this->_objectManager->get('Milan\Tiendas\Model\Tiendas')->load($model->getId());
                $deleteItem->delete();
                $count++;
            }
            $this->messageManager->addSuccessMessage(__('Un total de %1 Registro(s) se han eliminado.', $count));
        }catch(\Exception $e){
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Milan_Tiendas::delete_tiendas');
    }
}