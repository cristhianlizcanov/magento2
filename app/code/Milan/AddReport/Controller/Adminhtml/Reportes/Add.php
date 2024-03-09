<?php

namespace Milan\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/* La `clase Add extends \Magento\Backend\App\Action` está definiendo una nueva clase de controlador
llamada `Add` que extiende la clase `Magento\Backend\App\Action`. Este controlador es responsable de
manejar las solicitudes relacionadas con la adición de un nuevo informe en el área adminhtml de una
aplicación Magento. */
class Add extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param \Milan\AddReport\Model\Reportes
     */
    /**
     * La función es un constructor PHP que inicializa los objetos Context y PageFactory.
     *
     * @param Context context El parámetro `Context` en el constructor normalmente se refiere al objeto
     * de contexto del marco de Magento. Este objeto proporciona información sobre la solicitud actual,
     * como los parámetros de la solicitud, datos de la sesión y otra información contextual
     * relacionada con el entorno de ejecución actual. Se usa comúnmente en controladores Magento y
     * otros componentes para acceder a solicitudes.
     * @param PageFactory resultPageFactory El parámetro `resultPageFactory` en el constructor es una
     * instancia de la clase `PageFactory`. Este parámetro se usa típicamente para crear nuevas
     * instancias de un objeto de página en Magento 2. Es una clase de fábrica que ayuda a crear
     * objetos de página que se pueden usar para representar contenido en la interfaz.
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    /* El método `función pública ejecutar()` en el código PHP dado es responsable de manejar la lógica
    de ejecución de la acción del controlador. En este caso específico: */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Agregar Un Nuevo Reporte'));
        return $resultPage;
    }
}