<?php

namespace Milan\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/* La `clase Index extiende \Magento\Backend\App\Action` está definiendo una clase PHP llamada `Index`
que extiende la clase `\Magento\Backend\App\Action`. Esta clase se utiliza para manejar acciones del
controlador en el área de administración de Magento. El método `execute()` es responsable de
ejecutar la acción del controlador; en este caso, devuelve una fábrica de páginas de resultados. El
método `_isAllowed()` se utiliza para comprobar si el usuario actual tiene permiso para acceder a la
acción del controlador. */
class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    /**
     * La función anterior es un constructor PHP que inicializa el contexto y la fábrica de páginas de
     * resultados.
     *
     * @param Context context El parámetro `Context` en el constructor se usa normalmente en los
     * controladores Magento 2 para proporcionar información sobre la solicitud actual, como los
     * objetos de solicitud y respuesta, datos de sesión y otra información contextual relacionada con
     * la solicitud HTTP actual. Es una instancia de la clase `\Magento\Framework\App\Action\Context`
     * @param PageFactory resultPageFactory El parámetro `resultPageFactory` en el constructor es una
     * instancia de la clase `PageFactory`. Por lo general, se usa para crear nuevas instancias de un
     * objeto de página en Magento 2. Esta clase de fábrica ayuda a generar objetos de página que se
     * pueden usar para representar diferentes páginas en el panel de administración de Magento o
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /* El método `función pública ejecutar()` en la clase PHP dada es responsable de ejecutar la acción
    del controlador. En este caso específico, devuelve una instancia de la fábrica de páginas de
    resultados. Este método suele ser donde se implementa la lógica principal de la acción del
    controlador, como procesar datos, interactuar con modelos y preparar la respuesta que se
    mostrará al usuario. */
    public function execute()
    {
        return $this->resultPageFactory->create();

    }

    /* El método `función pública _isAllowed()` en la clase PHP dada verifica si el usuario actual
    tiene permiso para acceder a la acción específica del controlador. En este caso, se comprueba si
    el usuario tiene permiso para acceder al recurso 'Milan_AddReport::index_reportes'. Este método
    se usa comúnmente en los controladores Magento 2 para imponer el control de acceso y los
    permisos para diferentes acciones dentro del área de administración. */
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Milan_AddReport::index_reportes');
    }
}