<?php

namespace Milan\AddReport\Controller\Adminhtml\Reportes;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Milan\AddReport\Model\ReportesFactory;

/* La `clase InlineEdit extiende \Magento\Backend\App\Action` define una clase de controlador llamada
`InlineEdit` que extiende la clase `Magento\Backend\App\Action`. Este controlador es responsable de
manejar la funcionalidad de edición en línea de informes en el panel de administración de una tienda
Magento. */
class InlineEdit extends \Magento\Backend\App\Action
{
    protected $jsonFactory;
    private $reportesFactory;
    
    /**
     * La función es un constructor PHP que inicializa objetos Context, JsonFactory y Reportes.
     *
     * @param Context context El parámetro `Context` en el constructor se usa normalmente en Magento 2
     * para proporcionar información contextual y dependencias a la clase. Es una instancia de la clase
     * Magento\Framework\App\Helper\Context, que proporciona acceso a varios servicios y recursos
     * dentro de la aplicación Magento, como la configuración de la tienda, la solicitud y la
     * respuesta.
     * @param JsonFactory jsonFactory El parámetro `jsonFactory` en el constructor es una instancia de
     * la clase `JsonFactory`. Este parámetro se use para crear objetos JSON o manejar
     * datos JSON dentro de la clase donde está definido el constructor.
     * @param ReportesFactory reportesFactory El parámetro `reportesFactory` en el constructor es una
     * instancia de la clase `Reportes`. Para usarse para crear o trabajar con objetos de informe
     * dentro del contexto de la clase donde se define este constructor.
     */
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        ReportesFactory $reportesFactory
        )
        {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->reportesFactory = $reportesFactory;
    }

    /**
     * La función ejecuta una serie de acciones basadas en los parámetros de solicitud de AJAX,
     * actualizando y guardando datos mientras maneja posibles errores.
     *
     * La función `execute()` devuelve una respuesta JSON que contiene una serie de mensajes y
     * un indicador de error. La matriz de mensajes puede contener mensajes de error o un solo mensaje
     * que solicite corregir los datos enviados. El indicador de error se establece en verdadero si se
     * produjo algún error durante la ejecución de la función.
     */
    public function execute()
    {
      $resultJson = $this->jsonFactory->create();
      $error = false;
      $messages = [];

      if($this->getRequest()->getParam('isAjax'))
      {
        $postItems = $this->getRequest()->getParam('items', []);
        if(!count($postItems))
        {
            $messages[] = __(['Please correct the data sent.']);
            $error = true;
        }else{
            foreach(array_keys($postItems) as $modelid)
            {
                $model = $this->reportesFactory->create()->load($modelid);
                try
                {
                    $model->setData(array_merge($model->getData(), $postItems[$modelid]));
                    $model->save();
                }
                catch(\Exception $e)
                {
                    $messages[] = "[Error : {$modelid}] {$e->getMessage()}";
                    $error = true;
                }
            }
        }
      }

      return $resultJson->setData([
        'messages' => $messages,
        'error' => $error]);
    }
}
