<?php

namespace PowerBi\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{
    /**
     * @var \PowerBi\AddReport\Model\Index
     */
    protected $modelReportes;
    /**
     * @param Context $context
     * @param \PowerBi\AddReport\Model\Reportes $reportesFactory
     */
    public function __construct(
        Context $context,
        \PowerBi\AddReport\Model\Reportes $reportesFactory
    ){
        parent::__construct($context);
        $this->modelReportes = $reportesFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('PowerBi_AddReport::delete');
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
                $model = $this->modelReportes;
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