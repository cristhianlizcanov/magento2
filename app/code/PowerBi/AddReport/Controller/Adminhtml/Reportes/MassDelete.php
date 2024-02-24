<?php

namespace PowerBi\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use PowerBi\AddReport\Model\ResourceModel\Reportes\CollectionFactory;

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
                $deleteItem = $this->_objectManager->get('PowerBi\AddReport\Model\Reportes')->load($model->getId());
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
        return $this->_authorization->isAllowed('PowerBi_AddReport::delete_reportes');
    }
}