<?php

namespace Milan\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

/* La `clase Delete extiende Action` define una clase de controlador llamada `Delete` que extiende la
clase `Action` proporcionada por Magento. Este controlador es responsable de manejar la acción de
eliminación de una entidad específica en el panel de administración. Contiene métodos para comprobar
si el usuario puede realizar la acción de eliminación, ejecutar la acción de eliminación eliminando
la entidad con el ID especificado y mostrar mensajes de éxito o error en consecuencia. */
class Delete extends Action
{
    protected $modelReportes;
    /**
     * @param Context $context
     * @param \Milan\AddReport\Model\Reportes $reportesFactory
     */
    /**
     * El constructor inicializa un objeto modelo de Reportes en una clase PHP.
     *
     * @param Context context El parámetro `Context` en el constructor se usa normalmente en Magento 2
     * para proporcionar información contextual y dependencias a la clase. Es una instancia de la clase
     * Magento\Framework\App\Helper\Context, que proporciona acceso a varios servicios y ajustes de
     * configuración dentro de la aplicación Magento.
     * @param \Milan\AddReport\Model\Reportes reportesFactory El parámetro `$reportesFactory` en el
     * constructor es una instancia de la clase `\Milan\AddReport\Model\Reportes`. Se usa
     * para crear o trabajar con objetos de informe dentro del contexto de la clase donde se define
     * este constructor.
     */
    public function __construct(
        Context $context,
        \Milan\AddReport\Model\Reportes $reportesFactory
    ){
        parent::__construct($context);
        $this->modelReportes = $reportesFactory;
    }

    /* El método `función protegida _isAllowed()` en el código PHP proporcionado es un método que
    verifica si el usuario actual tiene los permisos necesarios para realizar la acción de
    eliminación. En este caso, se comprueba si el usuario tiene permiso para eliminar una entidad
    específica verificando el permiso 'Milan_AddReport::delete'. */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Milan_AddReport::delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    /**
     * La función ejecuta la eliminación de un registro según el ID de entidad proporcionado y
     * proporciona mensajes de éxito o error apropiados.
     *
     * La función `execute()` devuelve un resultado de redirección según las condiciones. Si se
     * proporciona una ID de entidad, intenta cargar y eliminar el registro correspondiente de la base
     * de datos. Si tiene éxito, se agrega un mensaje de éxito y se redirige al usuario a la ruta
     * predeterminada. Si se produce una excepción durante el proceso de eliminación, se agrega el
     * mensaje de error y se redirige al usuario a la página de edición
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