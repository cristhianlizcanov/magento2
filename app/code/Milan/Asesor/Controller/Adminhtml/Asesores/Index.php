<?php

namespace Milan\Asesor\Controller\Adminhtml\Asesores;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/* La clase Index extiende de la clase Magento\Backend\App\Action esta clase se utiliza
   para manejas las acciones del backend en Magento. */
class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

/* La función constructora de la clase se utiliza para inicializar el objecto. Recibe dos parametros:
    $context que proporciona información sobre el contexto de la acción y $resultPageFactory que se
    utiliza para crear una nueva página de resultados. */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /* La función execute se llama cuando se ejectuta la acción. Crea y devuelve una nueva
       página de resultados */
    public function execute()
    {
        return $this->resultPageFactory->create();
        
    }
    
    /* La función isAllowed se utiliza para comprobar si el usuario actual tiene permiso para acceder
       a esta acción. El permiso requerido es Milan_Asesor::index_asesores*/
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Milan_Asesor::index_asesores');
    }
}