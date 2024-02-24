<?php

namespace PowerBi\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use PowerBi\AddReport\Model\Reportes;

class Save extends Action
{
    /**
     * @var $reportes
     */
    protected $uiExamplemodel;
    /**
     * @var Session
     */
    protected $adminsession;
    /**
     * @param Action\Context $context
     * @param Reportes $uiExamplemodel
     * @param Session $adminsession
     */
    public function __construct(
        Action\Context $context,
        Reportes $uiExamplemodel,
        Session $adminsession
    ) {
        parent::__construct($context);
        $this->uiExamplemodel = $uiExamplemodel;
        $this->adminsession = $adminsession;
    }

    /**
     * Save reportes record action
     * 
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $entity_id = $this->getRequest()->getParam('entity_id');
            if ($entity_id) {
                $this->uiExamplemodel->load($entity_id);
            }
            $this->uiExamplemodel->setData($data);
            try {
                $this->uiExamplemodel->save();
                $this->messageManager->addSuccess(__('El registro se ha guardado'));
                $this->adminsession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        return $resultRedirect->setPath('*/*/add');
                    } else {
                        return $resultRedirect->setPath('*/*/edit', ['entity_id' => $this->uiExamplemodel->getEtitnyId(), '_current' => true]);
                    }
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Se produjo un error al guardar los datos.'));
            }
            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['entity_id' => $this->getRequest()->getParam('entity_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}