<?php

namespace Milan\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Milan\AddReport\Model\Reportes;

/* La "clase Save extiende de Action" define una clase de controlador llamada "Save" que extiende la
clase "Action" proporcionada por Magento. Este controlador es responsable de manejar el guardado de
registros de informes en el panel de administración. Contiene métodos para guardar datos de
informes, validar entradas y mostrar mensajes de éxito o error al usuario. El método `execute` es el
punto de entrada principal para este controlador y se llama cuando se accede al controlador. */
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

    const REDIRECT_PATH_EDIT = '*/*/edit';
    
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
    
    /**
     * Esta función PHP se encarga de guardar datos, mostrar mensajes de éxito o error y redirigir en
     * función de las acciones del usuario.
     *
     * retorna resultado de redirección a una ruta específica según el resultado de guardar datos.
     */
    public function execute()
{
    $data = $this->getRequest()->getPostValue();
    $resultRedirect = $this->resultRedirectFactory->create();
    $redirectPath = '*/*/';

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
                    $redirectPath = '*/*/add';
                } else {
                    $redirectPath = self::REDIRECT_PATH_EDIT;
                }
            }
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addError($e->getMessage());
            $redirectPath = self::REDIRECT_PATH_EDIT;
        } catch (\RuntimeException $e) {
            $this->messageManager->addError($e->getMessage());
            $redirectPath = self::REDIRECT_PATH_EDIT;
        } catch (\Exception $e) {
            $this->messageManager->addException($e, __('Se produjo un error al guardar los datos.'));
            $redirectPath = self::REDIRECT_PATH_EDIT;
        }
        $this->_getSession()->setFormData($data);
    }

    return $resultRedirect->setPath($redirectPath, ['entity_id' => $this->getRequest()->getParam('entity_id')]);
}

}