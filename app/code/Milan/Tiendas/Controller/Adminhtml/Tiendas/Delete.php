<?php

namespace Milan\Tiendas\Controller\Adminhtml\Tiendas;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{
    /**
     * @var \Milan\Tiendas\Model\Index
     */
    protected $modelTiendas;
    /**
     * @param Context $context
     * @param \Milan\Tiendas\Model\Tiendas $tiendasFactory
     */
    public function __construct(
        Context $context,
        \Milan\Tiendas\Model\Tiendas $tiendasFactory
    ){
        parent::__construct($context);
        $this->modelTiendas = $tiendasFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Milan_Tiendas::delete');
    }

    /**
     * Delete action
     * 
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if($id){
            try{
                $model = $this->modelTiendas;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Registro eliminado con éxito'));
                return $resultRedirect->setPath('*/*/');
            }catch(\Exception $e){
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('El Registro no existe'));
        return $resultRedirect->setPath('*/*/');
    }
}