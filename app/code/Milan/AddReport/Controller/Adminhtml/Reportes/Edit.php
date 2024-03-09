<?php
namespace Milan\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/* La `clase Edit extiende \Magento\Backend\App\Action` está definiendo una clase PHP llamada `Edit`
que extiende la clase `\Magento\Backend\App\Action`. Esto significa que la clase `Edit` hereda
propiedades y métodos de la clase `\Magento\Backend\App\Action`, lo que le permite utilizar la
funcionalidad proporcionada por esa clase principal. En este caso, la clase "Editar" es una clase de
controlador utilizada para manejar solicitudes relacionadas con la edición de informes en el panel
de administración de Magento. */
class Edit extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param \Milan\AddReport\Model\Reportes $reportesFactory
     */
    /**
     * La función es un constructor PHP que inicializa los objetos de fábrica de la página de
     * resultados y contexto.
     *
     * @param Context context El parámetro `Context` en el constructor se usa normalmente en los
     * controladores Magento 2 para proporcionar información sobre la solicitud actual, como el objeto
     * de solicitud, el objeto de respuesta, datos de sesión y otra información contextual relacionada
     * con la solicitud HTTP actual. Es una parte esencial del marco Magento 2 para el manejo
     * @param PageFactory resultPageFactory El parámetro `resultPageFactory` en el constructor es una
     * instancia de la clase `PageFactory`. Este parámetro se usa normalmente para crear nuevas
     * instancias de una página en Magento 2. La clase `PageFactory` proporciona métodos para crear y
     * devolver objetos de página que se pueden usar para representar contenido en
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
    /**
     
    
     * La función crea una página de resultados en PHP y establece el título en "Editar informe".
     *
     * Se devuelve una instancia de la página de resultados con el título "Editar Reporte".
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Editar Reporte'));
        return $resultPage;
    }
}