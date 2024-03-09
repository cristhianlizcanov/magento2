<?php

namespace Milan\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Milan\AddReport\Model\ResourceModel\Reportes\CollectionFactory;

/* La clase `MassDelete` extiende la clase `Action` en Magento. Es una clase de controlador responsable
de manejar la eliminación masiva de elementos del informe en el panel de administración. El método
"ejecutar" se utiliza para realizar la operación de eliminación recuperando una colección de
elementos del informe según el filtro aplicado, iterando sobre cada elemento y eliminándolo. Después
del proceso de eliminación, se muestra un mensaje de éxito para informar al usuario sobre la
cantidad de registros eliminados. El método `_isAllowed` se utiliza para el control de autorización
para verificar si el usuario actual tiene los permisos necesarios para eliminar elementos del
informe. */
class MassDelete extends Action
{
    public $collectionFactory;
    public $filter;

    /**
     * La función es un constructor PHP que inicializa propiedades con dependencias inyectadas.
     *
     * @param Context context El parámetro `Context` en el constructor se usa típicamente en Magento 2
     * para proporcionar información sobre el contexto actual de la aplicación, como la solicitud,
     * respuesta, sesión, etc. Es una parte fundamental de la arquitectura de la aplicación Magento y
     * se usa con frecuencia. para acceder a diversos servicios y recursos dentro de la aplicación
     * @param Filter filter Es probable que el parámetro `filtro` en el constructor sea una instancia
     * de una clase que maneja operaciones de filtrado de datos. Podría usarse para aplicar filtros a
     * una colección de datos, como filtrar productos en un sitio web de comercio electrónico según
     * ciertos criterios. La funcionalidad específica y el propósito de la clase "Filtro"
     * @param CollectionFactory collectionFactory Es el parámetro `CollectionFactory` en
     * el constructor se use para crear una colección de objetos en Magento. Esta clase de fábrica
     * ayuda a crear instancias de una clase de colección específica, que luego se puede usar para
     * recuperar y trabajar con datos de la base de datos. Proporciona una manera conveniente de
     * interactuar con colecciones de objetos.
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ){
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /**
     * La función ejecuta una operación de eliminación en una colección de elementos y muestra un
     * mensaje de éxito con el recuento de elementos eliminados o un mensaje de error si se produce una
     * excepción.
     *
     * La función `execute()` devuelve un resultado de tipo `Redirect` usando `ResultFactory`.
     * Está redirigiendo a la misma acción del controlador '.
     */
    public function execute()
    {
        try{
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $count = 0;
            foreach($collection as $model){
                $deleteItem = $this->_objectManager->get('Milan\AddReport\Model\Reportes')->load($model->getId());
                $deleteItem->delete();
                $count++;
            }
            $this->messageManager->addSuccessMessage(__('Un total de %1 Registro(s) se han eliminado.', $count));
        }catch(\Exception $e){
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/');
    }

    /* El método `función pública _isAllowed()` en el código PHP dado es un método utilizado para el
    control de autorización en Magento. Es parte del sistema de autorización integrado de Magento
    que verifica si el usuario actual tiene los permisos necesarios para realizar una acción
    específica. */
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Milan_AddReport::delete_reportes');
    }
}