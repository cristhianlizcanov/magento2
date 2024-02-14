<?php
namespace Prueba\BackendDev\Controller\Adminhtml\Demolist;

use Magento\Backend\App\Action;

class Delete extends Action
{

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Prueba_BackendDev::demolist');
    }


    public function execute()
    {        
        $id = $this->getRequest()->getParam('entity_id');        
        $resultRedirect = $this->resultRedirectFactory->create();
        
        if ($id) {
            $title = "";
            try {
                // init model and delete
                $model = $this->_objectManager->create('Prueba\BackendDev\Model\Demo');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('The item has been deleted.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['entity_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a listing to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
} 